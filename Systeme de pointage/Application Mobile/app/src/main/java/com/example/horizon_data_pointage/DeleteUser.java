package com.example.horizon_data_pointage;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class DeleteUser extends AppCompatActivity {
    TextView deluid, delname, delmobile, delgender, delemail;

    int position;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_delete_user);
        deluid = findViewById(R.id.deluid);
        delemail = findViewById(R.id.delemaile);
        delname = findViewById(R.id.delname);
        delgender = findViewById(R.id.delgender);
        delmobile = findViewById(R.id.delmobile);

        Intent intent = getIntent();
        position = intent.getExtras().getInt("position");

        deluid.setText(Adduser.employeeArrayList.get(position).getUid());
        delname.setText(Adduser.employeeArrayList.get(position).getName());
        delgender.setText(Adduser.employeeArrayList.get(position).getGender());
        delemail.setText(Adduser.employeeArrayList.get(position).getEmail());
        delmobile.setText(Adduser.employeeArrayList.get(position).getMobile());
    }


    public void btndelete(View view) {


String uid=deluid.getText().toString();

        final ProgressDialog progressDialog = new ProgressDialog(DeleteUser.this);
        progressDialog.setMessage("Supprission....");
        progressDialog.show();

        StringRequest request = new StringRequest(Request.Method.POST, "http://192.168.43.156/horizonData/supprission.php",
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        Toast.makeText(DeleteUser.this, response, Toast.LENGTH_SHORT).show();
                        startActivity(new Intent(getApplicationContext(), Main2Activity.class));
                        finish();
                        progressDialog.dismiss();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(DeleteUser.this, error.getMessage(), Toast.LENGTH_SHORT).show();
                progressDialog.dismiss();

            }
        }) {

            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                Map<String, String> params = new HashMap<String, String>();

                params.put("uid", uid);


                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(DeleteUser.this);
        requestQueue.add(request);


    }

}
