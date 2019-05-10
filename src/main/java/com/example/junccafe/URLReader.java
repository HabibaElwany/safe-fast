package com.example.junccafe;

import java.io.DataOutputStream;
import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;

public class URLReader {
    /* This one is responsible of sending any data that will be sent to the javascript code*/
    String url;
    HttpURLConnection conn;
    URL urlObj;
    public URLReader() throws IOException {
        url = "D:/project/code/try.html";
        urlObj = new URL(url);
        conn = (HttpURLConnection) urlObj.openConnection();
    }
    public void send(String longitude, String latitude) throws Exception{
        String lon = URLEncoder.encode(longitude, "UTF-8");
        String lat= URLEncoder.encode(latitude, "UTF-8");

        conn.setDoOutput(true);
        conn.setRequestMethod("POST");
        conn.setRequestProperty("Accept-Charset", "UTF-8");

        conn.setReadTimeout(10000);
        conn.setConnectTimeout(15000);

        conn.connect();

        DataOutputStream wr = new DataOutputStream(conn.getOutputStream());

        wr.writeBytes("longitude="+lon+"&latitude="+lat);
        wr.flush();
        wr.close();
    }

}