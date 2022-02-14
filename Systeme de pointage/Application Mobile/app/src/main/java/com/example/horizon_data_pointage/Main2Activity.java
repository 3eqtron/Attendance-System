package com.example.horizon_data_pointage;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.TextView;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

public class Main2Activity extends AppCompatActivity {
ImageButton update,delete,add,consultation,logout;
TextView temps;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        update=findViewById(R.id.update);
        add=findViewById(R.id.adduser);
        delete=findViewById(R.id.delete);
        logout=findViewById(R.id.logout);
        consultation=findViewById(R.id.consultation);
        temps=findViewById(R.id.txv);
        long date = System.currentTimeMillis();
        SimpleDateFormat sdf = new SimpleDateFormat("dd MMM yyyy h:mm ");
        String dateString = sdf.format(date);
        temps.setText(dateString);
        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent logout =new Intent(Main2Activity.this,MainActivity.class);
                startActivity(logout);
            }
        });
        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intentadd =new Intent(Main2Activity.this,Adduser.class);
                startActivity(intentadd);
            }
        });
        update.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent update=new Intent(Main2Activity.this,Adduser.class);
                startActivity(update);
            }
        });
        delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intentdelete=new Intent(Main2Activity.this,Adduser.class);
                startActivity(intentdelete);
            }
        });
        consultation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent cons=new Intent(Main2Activity.this,Consultation.class);
                startActivity(cons);
            }
        });
    }

}
