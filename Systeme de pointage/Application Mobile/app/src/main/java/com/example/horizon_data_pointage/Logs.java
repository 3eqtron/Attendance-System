package com.example.horizon_data_pointage;

public class Logs {
    private String datelog;
    private String idcard,statut;

    public Logs(String idcard, String datelog, String statut) {
        this.idcard = idcard;
        this.datelog = datelog;
        this.statut = statut;
    }

    public String getIdcard() {
        return idcard;
    }

    public void setIdcard(String idcard) {
        this.idcard = idcard;
    }

    public String getDatelog() {
        return datelog;
    }

    public void setDatelog(String datelog) {
        this.datelog = datelog;
    }

    public String getStatut() {
        return statut;
    }

    public void setStatut(String statut) {
        this.statut = statut;
    }
}