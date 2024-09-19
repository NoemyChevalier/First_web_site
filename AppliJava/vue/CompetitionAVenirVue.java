package AppliJava.vue;
import javax.swing.*;
import java.awt.*;
import java.util.List;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import AppliJava.model.CompetitionModel;

public class CompetitionAVenirVue extends JPanel {

    private List<String> listeCompetitions;

    public CompetitionAVenirVue() {
        setLayout(null);

        JLabel comp = new JLabel("Compétitions à venir");
        comp.setBounds(109, 50, 200, 50);

        Font labelFont = comp.getFont();
        comp.setFont(new Font(labelFont.getName(), Font.BOLD, 20));

        add(comp);

        CompetitionModel competitionModel = new CompetitionModel();
        listeCompetitions = competitionModel.getlisteCompétitionsSansId();

        setPreferredSize(new Dimension(1187, 908));
    }
    public void updateListeCompetitions() {
        CompetitionModel competitionModel = new CompetitionModel();
        listeCompetitions = competitionModel.getlisteCompétitionsSansId();
        repaint();
    }
    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);

        g.setColor(new Color(144, 182, 217));
        for (int i = 0; i < listeCompetitions.size(); i++) {
            String competitionDetails = listeCompetitions.get(i);
            drawSquare(g, 101, 120 + i * 130, 240, 97, competitionDetails);
        }
    }

    private void drawSquare(Graphics g, int x, int y, int width, int height, String text) {
        g.setColor(new Color(144, 182, 217));  // couleurs rectangles
        g.drawRect(x, y, width, height);
    
        FontMetrics texte = g.getFontMetrics();
    
        int margin = 15;
        int Ydonnee = y + texte.getAscent() + margin;
        String[] espace = text.split(" / ");
        for (int i = 0; i < espace.length; i++) {
            String line = espace[i];
            int textWidth = texte.stringWidth(line);
            int X = x + (width - textWidth) / 2;
    
            Font texteFont = g.getFont();
           
                g.setColor(Color.BLACK);  // txt
                if(i==0)
                {
                    g.setFont(new Font(texteFont.getName(), Font.BOLD, texteFont.getSize()));
                g.setFont(new Font(texteFont.getName(), Font.BOLD, 13));
                }
                
            
    
            g.drawString(line, X, Ydonnee);
    
            if (i == 0) {
                g.setColor(new Color(144, 182, 217)); 
                g.setFont(texteFont);
            }
    
            Ydonnee += texte.getHeight();
        }
    }
    
    
}
