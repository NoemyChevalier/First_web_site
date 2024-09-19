package AppliJava.vue;

import AppliJava.model.CompetitionModel;
import AppliJava.model.InsertionCompetition;
import AppliJava.model.SuppressionCompetition;

import javax.swing.*;
import java.awt.*;
import java.util.List;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class ModifierCompetitionVue {
    private JComboBox<String> comboBoxCompetitions;

    public void afficher() {
        JFrame modifierFenetre = new JFrame("modifier une compétition");
        modifierFenetre.setLayout(new BorderLayout());

        modifierFenetre.setSize(600, 400);
        modifierFenetre.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        modifierFenetre.setLocationRelativeTo(null);

        // Header
        JPanel header = new JPanel();
        Color lightBlue = new Color(192, 222, 244);
        header.setBackground(lightBlue);
        JLabel titre = new JLabel("Modifier une compétition");
        header.add(titre);

        // Contenu
        JPanel contenu = new JPanel(new GridBagLayout());
        contenu.setBackground(Color.WHITE);

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.anchor = GridBagConstraints.WEST;

        JLabel labelSelection = new JLabel("Sélectionnez une compétition à modifier :");

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

        JButton boutonmodifier = new JButton("modifier");
        boutonmodifier.setBackground(lightBlue);

        boutonmodifier.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

                String numCompetition = (String) comboBoxCompetitions.getSelectedItem();

                if (!numCompetition.equals("Sélectionnez une compétition")) {
                    String[] parts = numCompetition.split(":");

                    if (parts.length > 0) {
                        String competitionId = parts[0].trim();
                        

                        ModifierCompetitionParIdVue modifierCompetitionParIdVue = new ModifierCompetitionParIdVue(competitionId);
                        
                    }

                    else {
                        JOptionPane.showMessageDialog(null, "Aucune compétition sélectionnée.");
                    }
                }
            }
        });

        boutonAnnuler.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                modifierFenetre.dispose();
            }
        });
        footer.add(boutonAnnuler);
        footer.add(boutonmodifier);

        modifierFenetre.add(header, BorderLayout.NORTH);
        modifierFenetre.add(contenu, BorderLayout.CENTER);
        modifierFenetre.add(footer, BorderLayout.SOUTH);

        modifierFenetre.setVisible(true);
    }

    private String[] getCompetitions() {
        CompetitionModel competitionModel = new CompetitionModel();
        List<String> listeCompétitions = competitionModel.getlisteCompétitions();
        competitionModel.closeConnection();

        return listeCompétitions.toArray(new String[0]);
    }
}
