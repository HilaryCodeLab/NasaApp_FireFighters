// FireFighters NASA Space Apps //
#include <DHT.h>      // Including library for dht
#include <ESP8266WiFi.h>
String apiKey = ".............";     //  Enter here your Write API key from ThingSpeak.com 
const char *ssid =  "......";     // Enter your wifi name
const char *pass =  "......";      // Enter your wifi password
const char* server = "api.thingspeak.com"; 
#define DHTPIN 4          //pin# D2=GPIO_4 
DHT dht(DHTPIN, DHT11);    //creating object
WiFiClient client;
const int sensorIn = A0; //analog pin# A0;
int mVperAmp = 100; // use 100 for 20A Module and 66 for 30A Module
double Voltage = 0;
double VRMS = 0;
double AmpsRMS = 0;
int decimalPrecision=3;
float getVPP()
{
float result;
int readValue; //value read from the sensor
int maxValue = 0; // store max value here
int minValue = 1024; // store min value here
uint32_t start_time = millis();
while((millis()-start_time) < 3000) //sample for 3 Sec
{
readValue = analogRead(sensorIn);
// see if you have a new maxValue
if (readValue > maxValue)
{maxValue = readValue;}
if (readValue < minValue)
{minValue = readValue;}
}
result = ((maxValue-minValue)*5.0)/1024.0;
return result;
}
void setup() 
{
       Serial.begin(9600);
       delay(10);
       dht.begin();
       Serial.println("Connecting to ");
       Serial.println(ssid);
       WiFi.begin(ssid, pass);
      while (WiFi.status() != WL_CONNECTED) 
     {
            delay(500);
            Serial.print(".");
     }
      Serial.println("");
      Serial.println("WiFi connected");
}

 
void loop() 
{
Voltage = getVPP();
VRMS = (Voltage/2.0) *0.707; //root 2 is 0.707
AmpsRMS = (VRMS * 1000)/mVperAmp;
//Serial.print(AmpsRMS);
//Serial.println("\tAC Current: ");
//delay(100);
// calling & storing in variables>>> temp & humi
float h = dht.readHumidity();
float t = dht.readTemperature();
if (isnan(h) || isnan(t)) 
 {
  Serial.println("Failed to read from DHT sensor!");
  return;
 }
// Serial.print("\tTemperature: ");
// Serial.println(t);
// Serial.print("\tHumidity: ");
// Serial.println(h);
                      // api.thingspeak.com
                      if (client.connect(server,80))  
                      { 
                             String postStr = apiKey;
                             postStr +="&field1=";
                             postStr += String(t);
                             postStr +="&field2=";
                             postStr += String(h);
                             postStr +="&field3=";
                             postStr += String(AmpsRMS);
                             //  and so on number of fields could be add,
                             postStr += "\r\n\r\n";
 
                             client.print("POST /update HTTP/1.1\n");
                             client.print("Host: api.thingspeak.com\n");
                             client.print("Connection: close\n");
                             client.print("X-THINGSPEAKAPIKEY: "+apiKey+"\n");
                             client.print("Content-Type: application/x-www-form-urlencoded\n");
                             client.print("Content-Length: ");
                             client.print(postStr.length());
                             client.print("\n\n");
                             client.print(postStr);
 
                             Serial.print("\tTemperature: ");
                             Serial.println(t);
                             Serial.print("\tHumidity: ");
                             Serial.println(h);
                             Serial.print( "\tAC Amperes are: " ); 
                             Serial.println(AmpsRMS,decimalPrecision);
                             Serial.println(">>>>>>>>>>Sending to Thingspeak<<<<<<<<<<");
                        }
            client.stop();
            Serial.println("FireFighters...");
            Serial.println("***********");
delay(2000);
}
