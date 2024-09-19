/* Ce fichier a pour objectif de gérer toutes les actions relatives à l'insertion de données dans la table compétition */
package AppliJava.model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.swing.JOptionPane;

import AppliJava.vue.AjouterCompetitionVue;
import AppliJava.vue.CompetitionAVenirVue;

/** Classe gérant l'insertion de données dans la table compétition */
public class InsertionCompetition {

    private CompetitionAVenirVue competitionAVenirVue;
    public InsertionCompetition(CompetitionAVenirVue competitionAVenirVue) {
        this.competitionAVenirVue = competitionAVenirVue;
    }
    
    /** Insère une nouvelle compétition dans la BDD */
    public static void insererDonnees(String competitionNum, String competitionLieu, String competitionDate, String competitionhoraires,  String competitionType) {
          {
        String url = "jdbc:mysql://localhost:3308/patinageclub";
        Connection con = null;
        PreparedStatement preparedStatement = null;

        try {
            // Chargement du pilote JDBC
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Établissement de la connexion
            con = DriverManager.getConnection(url, "root", "");

            // Requête SQL pour l'insertion
            String query = "INSERT INTO competition(idcompetition, lieu_competition, date_competition, horairesCompetition, type_competition) VALUES (?, ?, ?, ?, ?)";

            // Création de l'instruction préparée
            preparedStatement = con.prepareStatement(query);
            preparedStatement.setString(1, competitionNum);
            preparedStatement.setString(2, competitionLieu);
            preparedStatement.setString(3, competitionDate);
            preparedStatement.setString(4, competitionhoraires);
            preparedStatement.setString(5, competitionType);

           
            int rowsAffected = preparedStatement.executeUpdate();

              if (rowsAffected > 0) {

                JOptionPane.showMessageDialog(null, "La compétition a été créée !");
                CompetitionAVenirVue competitionAVenirVue = new CompetitionAVenirVue();
                competitionAVenirVue.updateListeCompetitions();
                
            } else {

                JOptionPane.showMessageDialog(null, "Échec de l'enregistrement des données dans la base de données.");
            }
        } catch (ClassNotFoundException e) {
            System.err.print("ClassNotFoundException: ");
            System.err.println(e.getMessage());
        } catch (SQLException ex) {
    
            JOptionPane.showMessageDialog(null, "Erreur de format :" + ex.getMessage());
        } finally {
          
            try {
                if (preparedStatement != null) {
                    preparedStatement.close();
                }
                if (con != null) {
                    con.close();
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }
}
}