package AppliJava.vue;



import javax.swing.*;

import AppliJava.model.CompetitionModel;
import AppliJava.model.InsertionCompetition;
import AppliJava.model.ModificationCompetition;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.FocusListener;
import java.awt.event.FocusEvent;


public class ModifierCompetitionParIdVue {
    public ModifierCompetitionParIdVue(String id) {
        JFrame ajoutFenetre = new JFrame("Modifier une compétition");
        ajoutFenetre.setLayout(new BorderLayout());

        ajoutFenetre.setSize(500, 400);
        ajoutFenetre.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        ajoutFenetre.setLocationRelativeTo(null);

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
 
        JLabel labelLieu = new JLabel("Lieu de la compétition:");

      
        String[] lieux = {"Sélectionnez un lieu", "Strasbourg", "Metz", "Mulhouse", "Colmar", "Nancy", "Belfort"};
        JComboBox<String> lieuComboBox = new JComboBox<>(lieux);

        JLabel labelDiscipline = new JLabel("Disciplines : ");
        JCheckBox PatinageArt = new JCheckBox("Patinage artistique");
        JCheckBox PatinageSynchro = new JCheckBox("Patinage synchronisé");
        JCheckBox PatinageCouple = new JCheckBox("Patinage en couple");
        PatinageArt.setBackground(Color.WHITE);
        PatinageSynchro.setBackground(Color.WHITE);
        PatinageCouple.setBackground(Color.WHITE);

        JLabel labelDate = new JLabel("Date : ");
        JTextField champDate = new JTextField(getDate(id), 20);
        // champDate.setText("jj-mm-aaaa");
        champDate.setHorizontalAlignment(JTextField.CENTER);
        champDate.addFocusListener(new FocusListener() {
            @Override
            public void focusGained(FocusEvent e) {
                if (champDate.getText().equals(getDate(id))) {
                    champDate.setText("");
                    champDate.setForeground(Color.BLACK);
                }
            }

            @Override
            public void focusLost(FocusEvent e) {
                if (champDate.getText().isEmpty()) {
                    champDate.setText("jj-mm-aaaa");
                    champDate.setForeground(Color.GRAY);
                }
            }
        });

        JLabel labelHeureD = new JLabel("Heure de début : ");
        JTextField champHeureD = new JTextField(getHoraireDebutCompetition(id), 20);
        champHeureD.setHorizontalAlignment(JTextField.CENTER);
        champHeureD.addFocusListener(new FocusListener() {
            @Override
            public void focusGained(FocusEvent e) {
                if (champHeureD.getText().equals(getHoraireDebutCompetition(id))) {
                    champHeureD.setText("");
                    champHeureD.setForeground(Color.BLACK);
                }
            }

            @Override
            public void focusLost(FocusEvent e) {
                if (champHeureD.getText().isEmpty()) {
                    champHeureD.setText("hh:mm");
                    champHeureD.setForeground(Color.GRAY);
                }
            }
        });
        
          JLabel labelHeureF = new JLabel("Heure de fin : ");
        JTextField champHeureF = new JTextField(getHoraireFinCompetition(id), 20);
        champHeureF.setHorizontalAlignment(JTextField.CENTER);
        champHeureF.addFocusListener(new FocusListener() {
            @Override
            public void focusGained(FocusEvent e) {
                if (champHeureF.getText().equals(getHoraireFinCompetition(id))) {
                    champHeureF.setText("");
                    champHeureF.setForeground(Color.BLACK);
                }
            }

            @Override
            public void focusLost(FocusEvent e) {
                if (champHeureF.getText().isEmpty()) {
                    champHeureF.setText("hh:mm");
                    champHeureF.setForeground(Color.GRAY);
                }
            }
        });
        
          //Footer
        JPanel footer = new JPanel();
        footer.setBackground(Color.WHITE);
        JButton boutonAnnuler = new JButton("Annuler");
        boutonAnnuler.setBackground(Color.lightGray);

        JButton boutonAjouter = new JButton("Modifier");
        boutonAjouter.setBackground(lightBlue);

        // Gestion de la compétition
        boutonAjouter.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
            
                // String numCompetition = champNum.getText();
                String lieuCompetition = lieuComboBox.getSelectedItem().toString();
                String dateCompetition = champDate.getText();
                String heureDebut = champHeureD.getText();
                String heureFin = champHeureF.getText();
                String horairesCompetition = heureDebut + " - " + heureFin;
                String disciplines = "";
                if (PatinageArt.isSelected()) {
                    disciplines += "Patinage artistique, ";
                }
                if (PatinageSynchro.isSelected()) {
                    disciplines += "Patinage synchronisé, ";
                }
                if (PatinageCouple.isSelected()) {
                    disciplines += "Patinage en couple";
                }
                System.out.println("Numéro de la compétition : " + id);  
                ModificationCompetition.modifierCompetition(id, lieuCompetition, dateCompetition, horairesCompetition, disciplines);
            }
        });

        footer.add(boutonAnnuler);
        footer.add(boutonAjouter);
        
        //ajouts des éléments

  
        gbc.gridx = 0;
        gbc.gridy = 1;
        contenu.add(labelLieu, gbc);

        gbc.gridx = 1;
        gbc.gridy = 1;
        contenu.add(lieuComboBox, gbc);

        gbc.gridx = 0;
        gbc.gridy = 2;
        contenu.add(labelDiscipline, gbc);

        gbc.gridx = 1;
        gbc.gridy = 2;
        contenu.add(PatinageArt, gbc);

        gbc.gridx = 1;
        gbc.gridy = 3;
        contenu.add(PatinageSynchro, gbc);

        gbc.gridx = 1;
        gbc.gridy = 4;
        contenu.add(PatinageCouple, gbc);

        gbc.gridx = 0;
        gbc.gridy = 5;
        contenu.add(labelDate, gbc);

        gbc.gridx = 1;
        gbc.gridy = 5;
        contenu.add(champDate, gbc);

        gbc.gridx = 0;
        gbc.gridy = 6;
        contenu.add(labelHeureD, gbc);

        gbc.gridx = 1;
        gbc.gridy = 6;
        contenu.add(champHeureD, gbc);

        gbc.gridx = 0;
        gbc.gridy = 7;
        contenu.add(labelHeureF, gbc);

        gbc.gridx = 1;
        gbc.gridy = 7;
        contenu.add(champHeureF, gbc);





        ajoutFenetre.add(header, BorderLayout.NORTH);
        ajoutFenetre.add(contenu, BorderLayout.CENTER);
        ajoutFenetre.add(footer, BorderLayout.SOUTH);
        ajoutFenetre.setVisible(true);
    }

    public String getDate(String id)
    {
         CompetitionModel competitionModel = new CompetitionModel();
            String date = competitionModel.getDateCompetition(id);
            return date;
    }

    public String getHoraireDebutCompetition(String id)
    {
         CompetitionModel competitionModel = new CompetitionModel();
            String heureD = competitionModel.getHoraireDebutCompetition(id);
            return heureD;
    }

    public String getHoraireFinCompetition(String id)
    {
         CompetitionModel competitionModel = new CompetitionModel();
            String heureF = competitionModel.getHoraireFinCompetition(id);
            return heureF;
    }
}