package com.example.horizon_data_pointage;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class Adduser extends AppCompatActivity {
    ListView listView;
    MyAdapter adapter;
    public static ArrayList<employe> employeeArrayList = new ArrayList<>();
    String url = "http://192.168.43.156/horizonData/retrieve.php";
    employe emp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_adduser);
        listView = findViewById(R.id.mylistview);
        adapter = new MyAdapter(this, employeeArrayList);
        listView.setAdapter(adapter);

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, final int position, long id) {
                AlertDialog.Builder builder = new AlertDialog.Builder(view.getContext());
                ProgressDialog progressDialog = new ProgressDialog(view.getContext());

                CharSequence[] dialogItem = {"update","supprimer"};
                builder.setTitle(employeeArrayList.get(position).getName());
                builder.setItems(dialogItem, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {




                        switch (i){

                            case 0:

                                startActivity(new Intent(getApplicationContext(),Updateuser.class)
                                        .putExtra("position",position));

                                break;

                            case 1:
                                startActivity(new Intent(getApplicationContext(),DeleteUser.class)
                                        .putExtra("position",position));

                                break;

                        }
                    }

                });
                builder.create().show();
            }
        });
        retrieveData();
    }
    public void retrieveData(){

        StringRequest request = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        employeeArrayList.clear();
                        try{

                            JSONObject jsonObject = new JSONObject(response);
                            String sucess = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("tag");

                            if(sucess.equals("1")){


                                for(int i=0;i<jsonArray.length();i++){

                                    JSONObject object = jsonArray.getJSONObject(i);

                                    String uid = object.getString("uid");
                                    String name = object.getString("name");
                                    String gender = object.getString("gender");
                                    String email = object.getString("email");
                                    String mobile = object.getString("mobile");


                                    emp = new employe(uid,name,gender,email,mobile);
                                    employeeArrayList.add(emp);
                                    adapter.notifyDataSetChanged();



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
                Toast.makeText(Adduser.this, error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(request);




    }

}


