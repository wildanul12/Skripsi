#include <ESP8266WiFi.h>
#include <Servo.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <ESP8266HTTPClient.h>

HTTPClient http;
ESP8266WebServer server(80);

const char* ssid = "Modal brooo !!!!";
const char* password = "bojongwetan12";
const char* host = "192.168.1.5";

#define PULSE_PIN D2  //gpio4
#define LED_PIN D7    //gpio13

volatile long pulseCount=0;
float konstanta = 4.5;
float debit = 0;
unsigned int flowmlt;
unsigned long totalmlt;
float liter;
String meteran = "456";
unsigned long oldTime;

void ICACHE_RAM_ATTR pulseCounter()
{
  pulseCount++;
}

void setup()
{
  Serial.begin(115200);
  delay(100);
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  
  pulseCount  = 0;
  debit       = 0.0;
  flowmlt     = 0;
  totalmlt    = 0;
  oldTime     = 0; 

  pinMode(LED_PIN, OUTPUT);
  digitalWrite(LED_PIN, HIGH);  // We have an active-low LED attached
 
  pinMode(PULSE_PIN, INPUT);
//  pinMode(PULSE_PIN, INPUT_PULLUP);
//  digitalWrite(PULSE_PIN, HIGH);   ????
  attachInterrupt(PULSE_PIN, pulseCounter, FALLING);
  server.begin();
}

void loop() {

   if((millis() - oldTime) > 120000)    // Only process counters once per second
  {
    detachInterrupt(PULSE_PIN);
    debit = ((1000.0 / (millis() - oldTime)) * pulseCount) / konstanta;
    oldTime = millis();
    flowmlt = (debit / 60) * 120000;
    totalmlt = flowmlt;     
    liter = totalmlt * 0.001;
    
    unsigned int frac; 
    Serial.print("ID Meteran : ");
    Serial.print(meteran+" ");
    
    Serial.print("  Debit Air : ");
    Serial.print(int(debit));  // Print the integer part of the variable
    Serial.print(".");             // Print the decimal point
    frac = (debit - int(debit)) * 10;
    Serial.print(frac, DEC) ;      // Print the fractional part of the variable
    Serial.print("L/min");
    Serial.print("\t");
    Serial.print("Volume Air : ");             // Output separator
    Serial.print(flowmlt);
    Serial.print("mL/Sec");
    Serial.print("\t");
    Serial.print("Total Penggunaan Air : ");             // Output separator
    Serial.print(liter);
    Serial.println("L");
    //Serial.print(totalMilliLitres);
    //Serial.println("mL");

    pulseCount = 0;

    attachInterrupt(PULSE_PIN, pulseCounter, FALLING);

    Serial.print("connecting to ");
    Serial.println(host);
 
    WiFiClient client;
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

// We now create a URI for the request
  String url = "/fix/sensor.php?";
  url += "liter=";
  url += liter;
  url += "&meteran=";
  url += meteran;
  url += "&debit=";
  url += debit;
  url += "&volume=";
  url += flowmlt;
  
  Serial.print("Requesting URL: ");
  Serial.println(url);

// This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
 

// Read all the lines of the reply from server and print them to Serial
  while(client.available()){
    String line = client.readStringUntil('\r');
    //Serial.print(line);
  }

  Serial.println();
  Serial.println("closing connection");
  Serial.println();
  }
}
