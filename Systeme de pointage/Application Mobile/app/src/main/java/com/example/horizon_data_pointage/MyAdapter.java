package com.example.horizon_data_pointage;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.util.List;

public class MyAdapter extends ArrayAdapter<employe> {

    Context context;
    List<employe> arrayListEmployee;


    public MyAdapter(@NonNull Context context, List<employe> arrayListEmployee) {
        super(context, R.layout.custom_list_item,arrayListEmployee);

        this.context = context;
        this.arrayListEmployee = arrayListEmployee;

    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
int pos=position+1;
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.custom_list_item,null,true);

        TextView tvnum = view.findViewById(R.id.usernum);
        TextView tvName = view.findViewById(R.id.nomlist);
        TextView tvsex = view.findViewById(R.id.sexlist);
        TextView tvemaille= view.findViewById(R.id.emaillist);
        TextView tvmobile= view.findViewById(R.id.mobilelist);
        tvnum.setText("Employés"+""+pos);
        tvName.setText(arrayListEmployee.get(position).getName());
        tvsex.setText(arrayListEmployee.get(position).getGender());
        tvemaille.setText(arrayListEmployee.get(position).getEmail());
        tvmobile.setText(arrayListEmployee.get(position).getMobile());

        return view;
    }
}
