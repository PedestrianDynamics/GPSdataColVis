package com.example.amm;

import android.content.Context;
import android.os.AsyncTask;
import android.view.Gravity;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

public class BackgroundTask extends AsyncTask<String,Void,String> {
    Context c;
    public BackgroundTask(Context c) {
        this.c = c;
    }
    @Override
    protected String doInBackground(String... strings) {

     //  String url1 = "http://10.0.2.2/android/insertLocation.php";
      // String url1=  "http://abualia4.000webhostapp.com/insertLocation.php";
        String url1=  "https://abualia.online/insertLocation.php";

        try {
            URL url = new URL(url1);
            HttpURLConnection httpurlconnection = (HttpURLConnection) url.openConnection();
            httpurlconnection.setRequestMethod("POST");

            //read data from the URL connection.
            httpurlconnection.setDoOutput(true);

            //write data to the URL connection.
            httpurlconnection.setDoInput(true);
            OutputStream os = httpurlconnection.getOutputStream();
            BufferedWriter bufferwriter = new BufferedWriter(new OutputStreamWriter(os, "UTF-8"));
            String data = URLEncoder.encode("lang", "UTF-8") + "=" + URLEncoder.encode(strings[0], "UTF-8") + "&" +
                    URLEncoder.encode("lat", "UTF-8") + "=" + URLEncoder.encode(strings[1], "UTF-8")+ "&" +
                    URLEncoder.encode("macAddr", "UTF-8") + "=" + URLEncoder.encode(strings[2], "UTF-8")+ "&" +
                    URLEncoder.encode("accuracy", "UTF-8") + "=" + URLEncoder.encode(strings[3], "UTF-8") ;
            bufferwriter.write(data);
            bufferwriter.flush();
            bufferwriter.close();
            os.close();

            InputStream IS = httpurlconnection.getInputStream();
            BufferedReader bufferreader = new BufferedReader(new InputStreamReader(IS, "iso-8859-1"));
            String response = "";
            String line = "";
            while ((line = bufferreader.readLine()) != null) {
                response += line;

            }
            bufferreader.close();
            IS.close();

            httpurlconnection.disconnect();

            return response;
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }


        return null;
    }

    @Override
    protected void onPostExecute(String s) {
        super.onPostExecute(s);

        Toast toast=   Toast.makeText(c, s, Toast.LENGTH_SHORT);
        toast.setGravity(Gravity.CENTER_VERTICAL| Gravity.TOP, 30, 100);
        toast.show();


    }
}
