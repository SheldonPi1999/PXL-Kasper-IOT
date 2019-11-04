#include "dht.h"
#define dht_apin 4 // Analog Pin sensor is connected to
 
dht DHT;

// lowest and highest sensor readings:
const int sensorMin = 0;     // sensor minimum
const int sensorMax = 1024;  // sensor maximum

void setup() 
{
  Serial.begin(9600);  
  delay(500);//Delay to let system boot
  Serial.println("DHT11 Humidity & temperature Sensor\n\n");
  delay(1000);//Wait before accessing Sensor
}

void loop() 
{
  // read the sensor on analog A1:
  int sensorReading = analogRead(A1);
  
  if(sensorReading >= 700)
  {
    Serial.println("Fire!");
  }

  else
  {
      Serial.println("No fire.");
  }

  DHT.read11(dht_apin);
  Serial.print("Current humidity = ");
  Serial.print(DHT.humidity);
  Serial.print("%  ");
  Serial.print("temperature = ");
  Serial.print(DHT.temperature); 
  Serial.println("C  ");
      
  delay(2000);  // delay between reads
}
