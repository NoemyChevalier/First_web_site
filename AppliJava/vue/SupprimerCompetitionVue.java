package AppliJava.vue;

import AppliJava.model.CompetitionModel;
import AppliJava.model.InsertionCompetition;
import AppliJava.model.SuppressionCompetition;

import javax.swing.*;
import java.awt.*;
import java.util.List;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class SupprimerCompetitionVue {
    private JComboBox<String> comboBoxCompetitions;

    public void afficher() {
        JFrame supprimerFenetre = new JFrame("Supprimer une compétition");
        supprimerFenetre.setLayout(new BorderLayout());

        supprimerFenetre.setSize(600, 400);
        supprimerFenetre.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        supprimerFenetre.setLocationRelativeTo(null);

        // Header
        JPanel header = new JPanel();
        Color lightBlue = new Color(192, 222, 244);
        header.setBackground(lightBlue);
        JLabel titre = new JLabel("Supprimer une compétition");
        header.add(titre);

        // Contenu
        JPanel contenu = new JPanel(new GridBagLayout());
        contenu.setBackground(Color.WHITE);

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.anchor = GridBagConstraints.WEST;

        JLabel labelSelection = new JLabel("Sélectionnez une compétition à supprimer :");

        // menu dérolant
        comboBoxCompetitions = new JComboBox<>(getCompetitions());
        comboBoxCompetitions.insertItemAt("Sélectionnez une compétition", 0);
        comboBoxCompetitions.setSelectedIndex(0);

        gbc.gridx = 0;
        gbc.gridy = 0;
        contenu.add(labelSelection, gbc);

        gbc.gridx = 0;
        gbc.gridy = 1;
        contenu.add(comboBoxCompetitions, gbc);

        // Footer
        JPanel footer = new JPanel();
        footer.setBackground(Color.WHITE);
        JButton boutonAnnuler = new JButton("Annuler");
        boutonAnnuler.setBackground(Color.lightGray);

        JButton boutonSupprimer = new JButton("Supprimer");
        boutonSupprimer.setBackground(lightBlue);

        boutonSupprimer.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

                String numCompetition = (String) comboBoxCompetitions.getSelectedItem();

                if (!numCompetition.equals("Sélectionnez une compétition")) {
                    String[] parts = numCompetition.split(":");

                    if (parts.length > 0) {
                        String competitionId = parts[0].trim();
                        SuppressionCompetition.supprimerCompetition(competitionId);

                        // maj apres suppression
                        comboBoxCompetitions.setModel(new DefaultComboBoxModel<>(getCompetitions()));
                        comboBoxCompetitions.insertItemAt("Sélectionnez une compétition", 0);
                        comboBoxCompetitions.setSelectedIndex(0);
                    }

                    else {
                        JOptionPane.showMessageDialog(null, "Aucune compétition sélectionnée.");
                    }
                }
            }
        });

        boutonAnnuler.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                supprimerFenetre.dispose();
            }
        });
        footer.add(boutonAnnuler);
        footer.add(boutonSupprimer);

        supprimerFenetre.add(header, BorderLayout.NORTH);
        supprimerFenetre.add(contenu, BorderLayout.CENTER);
        supprimerFenetre.add(footer, BorderLayout.SOUTH);

        supprimerFenetre.setVisible(true);
    }

    private String[] getCompetitions() {
        CompetitionModel competitionModel = new CompetitionModel();
        List<String> listeCompétitions = competitionModel.getlisteCompétitions();
        competitionModel.closeConnection();

        return listeCompétitions.toArray(new String[0]);
    }
}
