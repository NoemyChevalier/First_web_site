/*Ce fichier gére la connexion de l'Admin et toutes les actions relatives aux membres (admin, adhérents) du club*/

package AppliJava.model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;
import AppliJava.vue.AjouterCompetitionVue;
import java.util.ArrayList;
import java.util.List;


import AppliJava.vue.CompetitionAVenirVue;

/** Classe gérant la connexion admin et l'accès aux données et traitements relatifs aux membres et admins*/
public class ConnexionAdmin {

    private static final String url = "jdbc:mysql://localhost:3308/patinageclub";

    public static boolean verifierConnexionAdmin(String identifiant, String mdp) {
        String query = "SELECT * FROM entraineur WHERE loginEntraineur = ? AND mdpEntraineur = ?";
    
        try (Connection con = DriverManager.getConnection(url, "root", "");
             PreparedStatement preparedStatement = con.prepareStatement(query)
        ) {
            preparedStatement.setString(1, identifiant);
            preparedStatement.setString(2, mdp);
    
            try (ResultSet resultSet = preparedStatement.executeQuery()) {
                return resultSet.next();
            }
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }
    

    /** Créé et insère un nouvel admin à la BDD */
    public static void ajouterAdmin(String nom, String prenom, String date, String id, String psswd) {
        String query = "INSERT INTO entraineur(nomEntraineur, prenomEntraineur, dateNaissanceEntraineur, loginEntraineur, mdpEntraineur) VALUES (?, ?, ?, ?, ?)";
    
        try (Connection con = DriverManager.getConnection(url, "root", "");
             PreparedStatement preparedStatement = con.prepareStatement(query)
        ) {
            preparedStatement.setString(1, nom);
            preparedStatement.setString(2, prenom);
            preparedStatement.setString(3, date);
            preparedStatement.setString(4, id);
            preparedStatement.setString(5, psswd);
    
            int rowsAffected = preparedStatement.executeUpdate();
    
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "L'administrateur a été créé !");
            } else {
                JOptionPane.showMessageDialog(null, "Échec de l'enregistrement des données dans la base de données.");
            }
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "Erreur de format : " + e.getMessage());
            e.printStackTrace();
        }
    }
    

    /** Méthode retournant la liste des informations essentielles des adhérents sous forme de liste de chaînes de caractère */
    public static List<String[]> getAdherents() {
        String url = "jdbc:mysql://localhost:3308/patinageclub";
        List<String[]> adherents = new ArrayList<>();

        try (Connection con = DriverManager.getConnection(url, "root", "");
             PreparedStatement preparedStatement = con.prepareStatement("SELECT login, prenom, age, email, telephone FROM adhérent");
             ResultSet resultSet = preparedStatement.executeQuery()) {

                while (resultSet.next()) {
                    String login = resultSet.getString("login");
                    String prenom = resultSet.getString("prenom");
                    String age = resultSet.getString("age");
                    String email = resultSet.getString("email");
                    String telephone = resultSet.getString("telephone");
    
                    String[] adherentInfo = {login, prenom, age, email, telephone};
                    adherents.add(adherentInfo);
                }
    
            } catch (SQLException e) {
                e.printStackTrace();
            }
    
            return adherents;
        }

        /** Méthode retournant la liste des informations essentielles des compétitions sous forme de liste de chaînes de caractère */
        public static List<String[]> getCompetitions() {
            String url = "jdbc:mysql://localhost:3308/patinageclub";
            List<String[]> competitions = new ArrayList<>();
    
            try (Connection con = DriverManager.getConnection(url, "root", "");
                 PreparedStatement preparedStatement = con.prepareStatement("SELECT lieu_competition, date_competition, horairesCompetition, type_competition FROM competition");
                 ResultSet resultSet = preparedStatement.executeQuery()) {
    
                    while (resultSet.next()) {
                        String nomCompetition = resultSet.getString("lieu_competition");
                        String dateCompetition = resultSet.getString("date_competition");
                        String horairesCompetition = resultSet.getString("horairesCompetition");
                        String typeCompetition = resultSet.getString("type_competition");
        
                        String[] competitionInfo = {nomCompetition, dateCompetition, horairesCompetition, typeCompetition};
                        competitions.add(competitionInfo);
                    }
        
                } catch (SQLException e) {
                    e.printStackTrace();
                }
        
                return competitions;
            }
    }
    



