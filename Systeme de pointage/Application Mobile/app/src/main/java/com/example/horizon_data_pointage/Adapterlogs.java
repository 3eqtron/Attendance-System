package com.example.horizon_data_pointage;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.util.List;

public class Adapterlogs extends ArrayAdapter<Logs> {
    Context context;
    List<Logs> arrayListLogs;
    public Adapterlogs(@NonNull Context context, List<Logs> arrayListLogs) {
       super(context, R.layout.const_list,arrayListLogs);


        this.context = context;
        this.arrayListLogs = arrayListLogs;

    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.const_list,null,true);

        TextView nm = view.findViewById(R.id.nm);
        TextView datelg = view.findViewById(R.id.datelg);
        TextView st = view.findViewById(R.id.st);

        nm.setText(arrayListLogs.get(position).getIdcard());
        datelg.setText(arrayListLogs.get(position).getDatelog());
        st.setText(arrayListLogs.get(position).getStatut());
            st.setBackgroundColor(Color.GREEN);



        return view;
    }
}

