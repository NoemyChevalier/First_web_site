
package AppliJava.vue;

import javax.swing.*;

import AppliJava.controleur.CompetitionControleur;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.*;

public class GestionCompetitionsVue extends JPanel {

    private CompetitionControleur controller;

    public GestionCompetitionsVue(CompetitionControleur controller) {
        this.controller = controller;
        setLayout(null);

        JLabel gestionLabel = new JLabel("Gestion des compétitions");
        gestionLabel.setBounds(450, 50, 400, 50);

        Font labelFont = gestionLabel.getFont();
        gestionLabel.setFont(new Font(labelFont.getName(), Font.BOLD, 20));

        add(gestionLabel);

        // Ajout de boutons
        JButton boutonplus = new JButton("", new ImageIcon(getClass().getResource("/AppliJava/data/icone_plus.png")));
        JButton boutonedit = new JButton("", new ImageIcon(getClass().getResource("/AppliJava/data/icone_edit.png")));
        JButton boutonsupp = new JButton("", new ImageIcon(getClass().getResource("/AppliJava/data/icone_supp.png")));
        JButton boutonadmin = new JButton("", new ImageIcon(getClass().getResource("/AppliJava/data/addadmin.png")));
        JButton boutonlistem = new JButton("", new ImageIcon(getClass().getResource("/AppliJava/data/userlist.png")));
        JButton boutoncompet = new JButton("", new ImageIcon(getClass().getResource("/AppliJava/data/listcompet2.png")));
        
        Color lightBlue = new Color(192, 222, 244);
        boutonplus.setBackground(lightBlue); 
        boutonedit.setBackground(lightBlue);
        boutonsupp.setBackground(lightBlue);
        boutonadmin.setBackground(lightBlue);
        boutonlistem.setBackground(lightBlue);
        boutoncompet.setBackground(lightBlue);
        
        boutonplus.setBounds(400, 120, 100, 100);
        boutonedit.setBounds(550, 120, 100, 100);
        boutonsupp.setBounds(700, 120, 100, 100);
        boutonadmin.setBounds(400, 240, 100, 100);
        boutonlistem.setBounds(550, 240, 100, 100);
        boutoncompet.setBounds(700, 240, 100, 100);

        add(boutonplus);
        add(boutonedit);
        add(boutonsupp);
        add(boutonadmin);
        add(boutonlistem);
        add(boutoncompet);

        //ajout image en dessous
        JLabel image = new JLabel("", new ImageIcon(getClass().getResource("/AppliJava/data/illustration.png")), JLabel.CENTER);
        image.setBounds(0, 0, 1187, 1000);
        add(image);


        setPreferredSize(new Dimension(1187, 908));

        boutonplus.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                controller.boutonPlusClicked();
            }
        });

        boutonedit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                controller.boutonEditClicked();
            }
        });

        boutonsupp.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                controller.boutonSuppClicked();
            }
        });

        boutonadmin.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                controller.boutonAdminClicked();
            }
        });

        boutonlistem.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                controller.boutonListeMClicked();
            }
        });

        boutoncompet.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                controller.boutonCompetClicked();
            }
        });
    }

}
