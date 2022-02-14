package com.example.horizon_data_pointage;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Updateuser extends AppCompatActivity {
EditText upnom,upsex,upemail,upmobile,upuid;
String n,s,e,m,ui;
Button update;
int position;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_updateuser);
        upnom = findViewById(R.id.upnom);
        upsex = findViewById(R.id.upsex);
        upemail = findViewById(R.id.upemail);
        update = findViewById(R.id.update);
        upmobile = findViewById(R.id.upmobile);
        upuid = findViewById(R.id.upuid);
        Intent intent = getIntent();
        position = intent.getExtras().getInt("position");

       upuid.setText(Adduser.employeeArrayList.get(position).getUid());
        upnom.setText(Adduser.employeeArrayList.get(position).getName());
        upsex.setText(Adduser.employeeArrayList.get(position).getGender());
        upemail.setText(Adduser.employeeArrayList.get(position).getEmail());
        upmobile.setText(Adduser.employeeArrayList.get(position).getMobile());
    }

            public void btnupdate(View view) {


               final String name = upnom.getText().toString();
                final String email = upemail.getText().toString();
                final String gender = upsex.getText().toString();
                final String mobile = upmobile.getText().toString();
                final String uid=upuid.getText().toString();


                final ProgressDialog progressDialog = new ProgressDialog(Updateuser.this);
                progressDialog.setMessage("Updating....");
                progressDialog.show();

                StringRequest request = new StringRequest(Request.Method.POST, "http://192.168.43.156/horizonData/update.php",
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                                Toast.makeText(Updateuser.this, response, Toast.LENGTH_SHORT).show();
                                startActivity(new Intent(getApplicationContext(), Main2Activity.class));
                                finish();
                                progressDialog.dismiss();
                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(Updateuser.this, error.getMessage(), Toast.LENGTH_SHORT).show();
                        progressDialog.dismiss();

                    }
                }) {

                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {

                        Map<String, String> params = new HashMap<String, String>();

                        params.put("uid", uid);
                        params.put("name", name);
                        params.put("email", email);
                        params.put("gender", gender);
                        params.put("mobile", mobile);

                        return params;
                    }
                };

                RequestQueue requestQueue = Volley.newRequestQueue(Updateuser.this);
                requestQueue.add(request);


            }

        }

