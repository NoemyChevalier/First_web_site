package AppliJava.vue;

import AppliJava.VuePrincipale;
import AppliJava.model.CompetitionModel;
import AppliJava.model.ConnexionAdmin;

import javax.swing.*;
import java.awt.*;
import java.util.List;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class ConnexionAdminVue {
  

    public void afficher() {
        JFrame modifierFenetre = new JFrame("Se connecter");
        modifierFenetre.setLayout(new BorderLayout());

        modifierFenetre.setSize(600, 400);
        modifierFenetre.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        modifierFenetre.setLocationRelativeTo(null);

        // Header
        JPanel header = new JPanel();
        Color lightBlue = new Color(192, 222, 244);
        header.setBackground(lightBlue);
        JLabel titre = new JLabel("Se connecter");
        header.add(titre);

        // Contenu
        JPanel contenu = new JPanel(new GridBagLayout());
        contenu.setBackground(Color.WHITE);

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.anchor = GridBagConstraints.WEST;

        JLabel labelId = new JLabel("Votre id ");
        JTextField champId = new JTextField(20);
        JLabel labelMdp = new JLabel("Votre mot de passe ");
        JPasswordField champMdp = new JPasswordField(20);
        
        gbc.gridx = 0;
        gbc.gridy = 0;
        contenu.add(labelId, gbc);

        gbc.gridx = 0;
        gbc.gridy = 1;
        contenu.add(champId, gbc);

        gbc.gridx = 0;
        gbc.gridy = 2;
        contenu.add(labelMdp, gbc);

        gbc.gridx = 0;
        gbc.gridy = 3;
        contenu.add(champMdp, gbc);
     

        // Footer
        JPanel footer = new JPanel();
        footer.setBackground(Color.WHITE);
        JButton boutonAnnuler = new JButton("Annuler");
        boutonAnnuler.setBackground(Color.lightGray);

        JButton boutonmodifier = new JButton("Valider");
        boutonmodifier.setBackground(lightBlue);

        boutonmodifier.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String identifiant = champId.getText();
                String mdp = champMdp.getText();

                boolean connexionR = ConnexionAdmin.verifierConnexionAdmin(identifiant, mdp);

                if (connexionR) {
                    JOptionPane.showMessageDialog(null, "Connexion réussie !");
                    modifierFenetre.dispose();
                    VuePrincipale  vuePrincipale = new VuePrincipale();
                    vuePrincipale.afficher();
                    
                } else {
                    JOptionPane.showMessageDialog(null, "Identifiant ou mot de passe incorrect.");
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

}
