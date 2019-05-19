/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Connexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

/**
 *
 * @author barhe
 */
public class connexion {
    
    private static final String user = "ad_annuaire";
    private static final String pass = "pwannuaire";
    private static final String url = "jdbc:mysql://localhost/caisse";
    
    public static void main(String[] args) throws SQLException, ClassNotFoundException{
        
        try{
            StringBuffer buffer = new StringBuffer();
            //Connection con = DriverManager.getConnection(
            //"jdbc:mysql://192.168.64.2/caisse", "logicaisse", "logicaisse");
            
            Connection con = DriverManager.getConnection(
            "jdbc:mysql://localhost/caisse?useSSL=false", "herve", "herve");
            
            //Class.forName("com.mysql.jdbc.Driver");
            //Connection con = null;
            //con = DriverManager.getConnection(url,user,pass);
            Statement stmt;
            ResultSet rs;
            stmt = con.createStatement (ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
            rs = stmt.executeQuery("SELECT Prix_produit FROM produit WHERE Libelle_produit = 'Fenta' ");
            System.out.println("connecté");
            rs.last();
            buffer.append(rs.getFloat("Prix_produit"));
            
            System.out.println(buffer.toString());
            
        }
        catch (SQLException e ){
            System.err.print(e);
        }
        
        
    }
}
