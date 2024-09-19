/* Fichier gérant les traitement liés à la suppression de cmpétitions */

package AppliJava.model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/** Classe gérant la suppression d'une compétition */
public class SuppressionCompetition {

    /** Supprime une compétition de la BDD à l'aide de l'id fourni par l'utilisateur sélectionné depuis le menu déroulant */
    public static void supprimerCompetition(String competitionNum) {
        String url = "jdbc:mysql://localhost:3308/patinageclub";
        Connection con = null;
        PreparedStatement preparedStatement = null;

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");


            con = DriverManager.getConnection(url, "root", "");

            //SQL
            String query = "DELETE FROM competition WHERE idcompetition = ?";

            preparedStatement = con.prepareStatement(query);
            preparedStatement.setString(1, competitionNum);

            int rowsAffected = preparedStatement.executeUpdate();

            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "Compétition supprimée.");
            } else {
                JOptionPane.showMessageDialog(null, "Échec de la suppression");
            }
        } catch (ClassNotFoundException e) {
            System.err.print("ClassNotFoundException: ");
            System.err.println(e.getMessage());
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, "La suppression n'a pas fonctionné. Erreur de type : " + ex.getMessage());
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
