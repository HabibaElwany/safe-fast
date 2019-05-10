package com.example.addr;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.location.Criteria;
import android.location.Location;
import android.location.Address;
import android.location.Geocoder;

import java.io.IOException;
import java.util.List;
import java.util.Locale;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Build;
import android.os.Bundle;
import android.provider.MediaStore;
import android.provider.Settings;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import java.io.ByteArrayOutputStream;

public class Image extends AppCompatActivity implements LocationListener {
    byte[] byteArray;
    Button submit;
    Button view;
    ImageView imgcapture;
    Button camera;
    int REQUEST_IMAGE_CAPTURE = 1;
    Image instance;
    protected LocationManager locationManager;
    protected LocationListener locationListener;
    protected Context context;
    Location loc;
    double lat;
    double lon;
    Address address;
    String provider;
    Intent intent;
    protected String latitude, longitude;
    protected boolean gps_enabled, network_enabled;
    String imglon;
    String imglat;
    String timestamp;
    //double longitude;
    //double latitude;
    LocationManager lm;
    public Criteria criteria;
    public String bestProvider;
    static public final int REQUEST_LOCATION = 1;
    TextView txtLat;
    ImageView img;
    String img_str;
    @SuppressLint("MissingPermission")
    protected void onCreate(final Bundle savedInstanceState) {
        instance = this;
        super.onCreate(savedInstanceState);
        setContentView(R.layout.submitimage);
        camera = (Button) findViewById(R.id.camera);
        imgcapture = (ImageView) findViewById(R.id.image);
        submit = (Button) findViewById(R.id.submit);
        txtLat = (TextView) findViewById(R.id.textview1);
        img = (ImageView) findViewById(R.id.dataview);
        view = (Button) findViewById(R.id.view);

        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent cInt = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                configure_button();
                locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
                locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, instance);
                startActivityForResult(cInt, REQUEST_IMAGE_CAPTURE);
            }
        });/*
        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                    submitImage(v);
                    System.err.println("nada 3ala submit image");
            }
        });*/
        view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                viewdata(v);
                //System.err.println("nada 3ala view image");
            }
        });

    }

    public void submitImage(View View)
    {

        System.err.println("d5al fel submit image");
        String image = img_str;
        String type = "submit";
        BackgroundWorker backgroundWorker = new BackgroundWorker(this);
        System.err.println("nada 3ala backgroung");
        System.err.println(image +" send");
        backgroundWorker.execute(type,image);
    }

    public void viewdata(View View)
    {
        System.err.println("d5al fel view image");
        //id = "1";
        //image = String.valueOf(byteArray);
        String type = "view";
        BackgroundWorker backgroundWorker = new BackgroundWorker(this);
        System.err.println("nada 3ala backgroung");
        //backgroundWorker.execute(type,id,image);
        //data.setText(name);*/
    }
    String imagefile;
    String storeFilename;

    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == REQUEST_IMAGE_CAPTURE && resultCode == RESULT_OK) {
            Bitmap photo = (Bitmap) data.getExtras().get("data");
            imgcapture.setImageBitmap(photo);
            img.setImageBitmap(photo);
            ByteArrayOutputStream stream = new ByteArrayOutputStream();
            photo.compress(Bitmap.CompressFormat.JPEG, 100, stream);
            byteArray = stream.toByteArray();
            img_str = Base64.encodeToString(byteArray, Base64.DEFAULT);
            System.err.println("THis is the byte array" + byteArray);
//
//           imagefile = Base64.encodeToString(byteArray, Base64.DEFAULT);
//           System.err.println("This is the image file " + storeFilename);
//
//           ExifInterface exifInterface = null;
//            try {
//               exifInterface = new ExifInterface(storeFilename);
//               timestamp = exifInterface.getAttribute(ExifInterface.TAG_GPS_TIMESTAMP);
//               imglat = exifInterface.getAttribute(ExifInterface.TAG_GPS_LATITUDE);
//                imglon = exifInterface.getAttribute(ExifInterface.TAG_GPS_LONGITUDE);
//
//              System.err.println("This is the timestamp " + timestamp );
//              System.err.println("This is the " + imglat );
//              System.err.println("This is the " + imglon);
//           } catch (IOException e) {
//               e.printStackTrace();
//           }
        }
    }


        @SuppressLint("SetTextI18n")
        public void onLocationChanged(Location location) {
            //Intent data = null;
            imglon = String.valueOf(location.getLatitude());
            imglat = String.valueOf(location.getLongitude());
            lat = location.getLatitude();
            lon = location.getLongitude();
            System.err.println("This is the Longitude" + imglon);
            System.err.println("This is the Longitude" + imglat);
            txtLat = (TextView) findViewById(R.id.textview1);
            Geocoder geocoder = new Geocoder(this, Locale.getDefault());
            List<Address> addresses = null;
            try {
                addresses = geocoder.getFromLocation(lat, lon, 1);
            } catch (IOException e) {
                e.printStackTrace();
            }
            if (addresses.size() > 0) {
                address = addresses.get(0);
            }

            System.err.println("This is the address" + address);
                txtLat.setText("Latitude:" + location.getLatitude() + ", Longitude:" + location.getLongitude() + ",  adress: " + address.getAddressLine(0));
            //Bitmap image = (Bitmap) data.getExtras().get("data");
            //img.setImageBitmap(image);

        }

        @Override
        public void onProviderDisabled(String provider) {
            Intent i = new Intent(Settings.ACTION_LOCATION_SOURCE_SETTINGS);
            startActivity(i);
        }

        @Override
        public void onProviderEnabled(String provider) {
            Log.d("Latitude", "enable");
        }

        @Override
        public void onStatusChanged(String provider, int status, Bundle extras) {
            Log.d("Latitude", "status");
        }

        @Override
        public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
            switch (requestCode) {
                case 10:
                    configure_button();
                    break;
                default:
                    break;
            }
        }

        void configure_button() {
            // first check for permissions
            if ((ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) && (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED)) {
                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                    requestPermissions(new String[]{Manifest.permission.ACCESS_COARSE_LOCATION, Manifest.permission.ACCESS_FINE_LOCATION, Manifest.permission.INTERNET}
                            , 10);
                }
                return;
            }
        }
    }





