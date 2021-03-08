package com.example.amm;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.Build;
import android.os.Bundle;
import android.provider.Settings;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.Toolbar;

import java.text.SimpleDateFormat;
import java.util.Date;

public class MainActivity extends AppCompatActivity  {
   private Button locate;
   private TextView coordinates;
   private LocationManager locationManager;
   private LocationListener locationListener;
   private TextView internet;
   private Button close;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        getSupportActionBar().setTitle("AMM GPS Data Collector");
        getSupportActionBar().setSubtitle("For Research Purposes");
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.logo);

        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.JELLY_BEAN_MR1)
            getWindow().getDecorView().setLayoutDirection(View.LAYOUT_DIRECTION_LTR);

        close=findViewById(R.id.close);

        // To exit
        close.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                android.os.Process.killProcess(android.os.Process.myPid());
                System.exit(1);
            }
        });

        locate=findViewById(R.id.button);
        coordinates=findViewById(R.id.textView);

        internet=findViewById(R.id.textView2);
        //Check the internet connection
        if(isNetworkAvailable())
        {
            // Toast.makeText(getBaseContext(),"connected",Toast.LENGTH_LONG).show();
            internet.setText("It is connected to the internet");
            internet.setBackgroundColor(Color.parseColor("#306090"));
        }
        else {
            // Toast.makeText(getBaseContext(),"disconnected",Toast.LENGTH_LONG).show();
            internet.setBackgroundColor(Color.RED);
            internet.setText("Please check the internet connection");
        }




        WifiManager wifiMgr = (WifiManager) getApplicationContext().getSystemService(WIFI_SERVICE);
        final WifiInfo wifiInfo = wifiMgr.getConnectionInfo();
        final String macAddr=wifiInfo.getMacAddress();
        //Toast.makeText(getBaseContext(),wifiInfo.getMacAddress()+"",Toast.LENGTH_SHORT).show();

        locationManager = (LocationManager) getSystemService(LOCATION_SERVICE);
        locationListener= new LocationListener() {
            @Override
            public void onLocationChanged(Location location) {
               if(isNetworkAvailable())
                 {
                     SimpleDateFormat simpleDateFormat = new SimpleDateFormat("dd-MM-yyyy hh:mm ss");
                     String format = simpleDateFormat.format(new Date());
                    // Toast.makeText(getBaseContext(),"connected",Toast.LENGTH_LONG).show();
                    internet.setText("It is connected to the internet");
                    internet.setBackgroundColor(Color.parseColor("#306090"));
                    String longtitude=location.getLongitude()+"";
                    String latitude=location.getLatitude()+"";
                    //String atitude=location.getAltitude()+"";
                    String t=location.getTime()+"";
                    String acc=location.getAccuracy()+"";
                     coordinates.append("\n"+ "  Long:"+longtitude+  " Lat:"+latitude+"  "+"Loc Err: " +acc +" m"+ " "+ format);
                    new BackgroundTask(getBaseContext()).execute(longtitude,latitude,deviceId(),acc);
                }
                else {
                    // Toast.makeText(getBaseContext(),"disconnected",Toast.LENGTH_LONG).show();
                   internet.setBackgroundColor(Color.RED);
                   internet.setText("Please check the internet connection");
              }


            }

            @Override
            public void onStatusChanged(String provider, int status, Bundle extras) {

            }

            @Override
            public void onProviderEnabled(String provider) {

            }

            @Override
            public void onProviderDisabled(String provider) {
                Intent intent=new Intent(Settings.ACTION_LOCATION_SOURCE_SETTINGS);
                startActivity(intent);
            }
        };


        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {


            if (checkSelfPermission(Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && checkSelfPermission(Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {

                requestPermissions(new String[]{
                        Manifest.permission.ACCESS_FINE_LOCATION,Manifest.permission.ACCESS_COARSE_LOCATION,Manifest.permission.INTERNET

                },10 );

                return;
            }
            else
                configureButton();


        }
        else {
            //Toast.makeText(getBaseContext(),"call",Toast.LENGTH_LONG).show();
            configureButton();

        }

    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        switch(requestCode){
            case 10: if(grantResults.length>0 && grantResults[0]==PackageManager.PERMISSION_GRANTED)
                configureButton();
                return;
        }
    }

    private void configureButton() {
         locate.setOnClickListener(new View.OnClickListener() {
          @Override
               public void onClick(View v) {
              // Toast.makeText(getBaseContext(),"call",Toast.LENGTH_LONG).show();
              // it only defines the trigger for location updates
              // The minimum time between updates in milliseconds
              // The minimum distance to change Updates in meters
               locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 1000, 0, locationListener);
          }
           });

    }

    private boolean isNetworkAvailable() {
        ConnectivityManager connectivityManager
                = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo activeNetworkInfo = connectivityManager.getActiveNetworkInfo();
        return activeNetworkInfo != null && activeNetworkInfo.isConnected();
    }

    private String deviceId() {
        return Settings.Secure.getString(this.getContentResolver(), Settings.Secure.ANDROID_ID);
    }

}
