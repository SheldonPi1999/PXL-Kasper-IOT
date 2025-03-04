#include "dht.h"
#define dht_apin 4 // Analog Pin sensor is connected to
 
dht DHT;
 
void setup()
{
    Serial.begin(9600);
    delay(500);//Delay to let system boot
    Serial.println("DHT11 Humidity & temperature Sensor\n\n");
    delay(1000);//Wait before accessing Sensor
}
 
void loop()
{
    DHT.read11(dht_apin);
    
    Serial.print("Current humidity = ");
    Serial.print(DHT.humidity);
    Serial.print("%  ");
    Serial.print("temperature = ");
    Serial.print(DHT.temperature); 
    Serial.println("C  ");
    
    delay(2000);//Wait 5 seconds before accessing sensor again.
}
