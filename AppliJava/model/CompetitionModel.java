/** Ce fichier permet de gérer les données des compétitions, par exemple en récupérant une liste avec les détails de chaque compétition */
package AppliJava.model;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;


/** Classe gérant l'accès aux données relatives aux compétitions, contenant des méthodes de récupération*/
public class CompetitionModel {

    private String url = "jdbc:mysql://localhost:3308/patinageclub";
    private Connection con = null;
    private String dateCompetition;
    private String horairesCompetition;
    private String typeCompetition;
    private String idCompetition;

    /** retourne la date d'une compétition*/
    public String getDateCompetition(String idCompetition) {
        String date_competition = "";
        try (PreparedStatement statement = con.prepareStatement("SELECT date_competition FROM competition WHERE idcompetition = ?")) {
            statement.setString(1, idCompetition);

            ResultSet resultSet = statement.executeQuery();
            while (resultSet.next()) {
                date_competition = resultSet.getString("date_competition");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return date_competition;
    }

    /** retourne l'horaire de début d'une compétition'*/
    public String getHoraireDebutCompetition(String idCompetition) {
        String horaireDebut = "";

        try (PreparedStatement statement = con.prepareStatement("SELECT horairesCompetition FROM competition WHERE idcompetition = ?")) {
            statement.setString(1, idCompetition);

            ResultSet resultSet = statement.executeQuery();

            while (resultSet.next()) {
                String horairesCompetition = resultSet.getString("horairesCompetition");
                String[] horairesParts = horairesCompetition.split("-");

                if (horairesParts.length >= 1) {
                    horaireDebut = horairesParts[0].trim();
                } else {
                    System.err.println("Erreur dans la récupération de l'horaire ");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return horaireDebut;
    }

    /** retourne l'horaire de fin d'une compétition'*/
    public String getHoraireFinCompetition(String idCompetition) {
        String horaireFin = "";

        try (PreparedStatement statement = con.prepareStatement("SELECT horairesCompetition FROM competition WHERE idcompetition = ?")) {
            statement.setString(1, idCompetition);

            ResultSet resultSet = statement.executeQuery();

            while (resultSet.next()) {
                String horairesCompetition = resultSet.getString("horairesCompetition");
                String[] horairesParts = horairesCompetition.split("-");

                if (horairesParts.length == 2) {
                    horaireFin = horairesParts[1].trim();
                } else {
                    System.err.println("Erreur dans la récupération de l'horaire ");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return horaireFin;
    }

    /**Initialise instance de la classe COmpetitionModel et établit la connexion à la bdd */
    public CompetitionModel() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            con = DriverManager.getConnection(url, "root", "");
        } catch (ClassNotFoundException e) {
            System.err.print("ClassNotFoundException: ");
            System.err.println(e.getMessage());
        } catch (SQLException ex) {
            System.err.println("SQLException : " + ex.getMessage());
        }
    }

    /** retourne la connexion à la bdd */
    public Connection getConnection() {
        return con;
    }

    /** ferme la connexion à la bdd */
    public void closeConnection() {
        try {
            if (con != null && !con.isClosed()) {
                con.close();
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    /** retourne la liste des compétitions concaténnée sous forme de chaîne de caractère avec un séaparateur entre chaque colonne de la BDD */
    public List<String> getlisteCompétitions() {
        List<String> listeCompétitions = new ArrayList<>();

        try (PreparedStatement statement = con.prepareStatement("SELECT idcompetition, date_competition, type_competition, lieu_competition, horairesCompetition FROM competition")) {
            ResultSet resultSet = statement.executeQuery();

            while (resultSet.next()) {
                String details = resultSet.getString("idcompetition") + ": "
                        + resultSet.getString("date_competition") + " / "
                        + resultSet.getString("type_competition") + " / "
                        + resultSet.getString("lieu_competition") + " / "
                        + resultSet.getString("horairesCompetition");
                listeCompétitions.add(details);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return listeCompétitions;
    }

    /** retourne la liste des compétitions à venir (à partir de la date actuelle) sans l'ID concaténnée sous forme de chaîne de caractère avec un séaparateur entre chaque colonne de la BDD */
    public List<String> getlisteCompétitionsSansId() {
        List<String> listeCompétitions = new ArrayList<>();

        try (PreparedStatement statement = con.prepareStatement("SELECT idcompetition, date_competition, type_competition, lieu_competition, horairesCompetition FROM competition WHERE date_competition >= CURDATE() ORDER BY date_competition")) {
            ResultSet resultSet = statement.executeQuery();

            while (resultSet.next()) {
                String details = resultSet.getString("date_competition") + " / "
                        + resultSet.getString("type_competition") + " / "
                        + resultSet.getString("lieu_competition") + " / "
                        + resultSet.getString("horairesCompetition");
                listeCompétitions.add(details);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return listeCompétitions;
    }
}
