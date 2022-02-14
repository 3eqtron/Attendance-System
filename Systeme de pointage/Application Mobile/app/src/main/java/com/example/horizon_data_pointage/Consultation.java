package com.example.horizon_data_pointage;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

public class Consultation extends AppCompatActivity {
    ListView listlogs;
    Adapterlogs adapter;
    Logs lg;
    ImageButton img1,img2;
    TextView datee;
    String datelog,statut;
    String dateselectionne = null;
    final ArrayList<Logs> logsArrayList = new ArrayList<>();
    String url = "http://192.168.43.156/horizonData/consultation.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_consultation);
        listlogs = findViewById(R.id.listlogs);
        img1 = findViewById(R.id.imbt1);
        img2 = findViewById(R.id.imbt2);

        datee = findViewById(R.id.datee);
        DateFormat df2 = new SimpleDateFormat("yyyy-MM-dd ");
        Calendar cal2 = Calendar.getInstance();
        datee.setText(df2.format(cal2.getTime()));
        dateselectionne = datee.getText().toString();
        adapter = new Adapterlogs(this, logsArrayList);




        img1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cal2.add(Calendar.DATE, -1);
                datee.setText(df2.format(cal2.getTime()));
                adapter.clear();
                dateselectionne = datee.getText().toString();
                getdata();
            }
        });
        img2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cal2.add(Calendar.DATE, +1);
                datee.setText(df2.format(cal2.getTime()));
                adapter.clear();
                dateselectionne = datee.getText().toString();


                getdata();
            }
        });

getdata();
    }

    public void getdata(){

        StringRequest request = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{

                            JSONObject jsonObject = new JSONObject(response);
                            String sucess = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("data");

                            if(sucess.equals("1")){


                                for(int i=0;i<jsonArray.length();i++){

                                    JSONObject object = jsonArray.getJSONObject(i);

                                    String idcard = object.getString("name");
                                    datelog = object.getString("datelog");
                                    statut = object.getString("statut");




                                    lg = new Logs(idcard,datelog,statut);
                                    logsArrayList.add(lg);
                                    listlogs.setAdapter(adapter);



                                }



                            }




                        }
                        catch (JSONException e){
                            e.printStackTrace();
                        }






                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
            }
        }){
            @Nullable
            @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String,String>params= new HashMap<String,String>();
                    params.put("datelog",dateselectionne);
                    return params;
                }
            };


        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        requestQueue.add(request);




    }



}