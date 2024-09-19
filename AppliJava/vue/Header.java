package AppliJava.vue;

import javax.swing.*;
import java.awt.*;

public class Header extends JPanel {

    public Header() {
        setPreferredSize(new Dimension(1187, 148));
        JLabel logo = new JLabel("", new ImageIcon(getClass().getResource("/AppliJava/data/LogoClub.png")), SwingConstants.LEFT);
        add(logo);
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        g.setColor(new Color(192, 222, 244));
        drawSquare(g, 0, 0, 1187, 148, "Ethereal Skate Club");
    }

    private void drawSquare(Graphics g, int x, int y, int largeur, int hauteur, String text) {
        g.drawRect(x, y, largeur, hauteur);
    
        g.setColor(Color.BLACK);
        Font titre = g.getFont();
        Font titreFont = new Font(titre.getName(), Font.BOLD, 25);
        g.setFont(titreFont);
    
        FontMetrics fontMetrics = g.getFontMetrics();
        int textX = x + largeur - fontMetrics.stringWidth(text) + 250;
        int textY = y + (hauteur + fontMetrics.getAscent()) / 2;
    
        g.drawString(text, textX, textY);

        JLabel logo = (JLabel) getComponent(0); 
        logo.setBounds(50, 20, logo.getPreferredSize().width, logo.getPreferredSize().height);
    }
    
    

  
}
