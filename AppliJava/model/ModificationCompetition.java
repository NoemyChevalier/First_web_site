/*Ce fichier a pour objectif de traiter et gérer l'envoi de données concernant la modification d'une compétition */
package AppliJava.model;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/** Classe gérant la modification d'une compétition */
public class ModificationCompetition {

    /** Modifie une compétition dans la BDD à l'aide des informations rentrées par l'utilisateur */
    public static void modifierCompetition(String competitionId, String nouveauLieu, String nouvelleDate, String nouveauxHoraires, String nouveauType) {
        String url = "jdbc:mysql://localhost:3308/patinageclub";
        Connection con = null;
        PreparedStatement preparedStatement = null;

        try {
            // Chargement du pilote JDBC
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Établissement de la connexion
            con = DriverManager.getConnection(url, "root", "");

            // Requête SQL pour la modification
            String query = "UPDATE competition SET lieu_competition = ?, date_competition = ?, horairesCompetition = ?, type_competition = ? WHERE idcompetition = ?";

            preparedStatement = con.prepareStatement(query);
            preparedStatement.setString(1, nouveauLieu);
            preparedStatement.setString(2, nouvelleDate);
            preparedStatement.setString(3, nouveauxHoraires);
            preparedStatement.setString(4, nouveauType);
            preparedStatement.setString(5, competitionId);

            int rowsAffected = preparedStatement.executeUpdate();

            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "La compétition a été modifiée !");
            } else {
                JOptionPane.showMessageDialog(null, "Échec de la modification de la compétition.");
            }
        } catch (ClassNotFoundException e) {
            System.err.print("ClassNotFoundException: ");
            System.err.println(e.getMessage());
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, "Erreur lors de la modification :" + ex.getMessage());
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
