package AppliJava.vue;

import AppliJava.controleur.GestionCompetitionControleur;
import AppliJava.model.ConnexionAdmin;

import javax.swing.*;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.TableColumnModel;
import javax.swing.table.JTableHeader;
import java.awt.*;
import java.util.List;


public class VueListeCompet {
    public void afficher() {
        JFrame frame = new JFrame("Compétitions");
        frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    
        JPanel appli = new JPanel();
        appli.setLayout(new BoxLayout(appli, BoxLayout.Y_AXIS));
        appli.setBackground(Color.WHITE);
    
        Header header = new Header();
        header.setBackground(new Color(192, 222, 244));
    
        appli.add(header);

        Color lightGrey = new Color(240, 240, 240);
        Color lightBlue = new Color(245, 250, 255);
    
        // Titre
        JLabel compet = new JLabel("Liste des compétitions");
        compet.setFont(new Font("SansSerif", Font.BOLD, 20));
        compet.setAlignmentX(Component.CENTER_ALIGNMENT);
        appli.setBackground(lightGrey);
        appli.add(compet);
    
        frame.add(appli);
       
        frame.add(appli);
        ConnexionAdmin connexionAdmin = new ConnexionAdmin();
        List<String[]> compets = connexionAdmin.getCompetitions();

        String[] nomsColonnes = {"Lieu", "Date", "Horaires", "Discipline(s)"};
        Object[][] data = compets.toArray(new Object[0][]);

        JTable table = new JTable(data, nomsColonnes);

        table.setGridColor(Color.WHITE);
        TableColumnModel columnModel = table.getColumnModel();
        columnModel.getColumn(0).setPreferredWidth(80);
        columnModel.getColumn(1).setPreferredWidth(80);
        columnModel.getColumn(2).setPreferredWidth(30);
        columnModel.getColumn(3).setPreferredWidth(150);
    


        /* HEADER DU TABLEAU */

        JTableHeader jheader = table.getTableHeader();

        Font boldFont = new Font("SansSerif", Font.BOLD, 14);
    

        DefaultTableCellRenderer headerRenderer = new DefaultTableCellRenderer() {
            @Override
            public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
                Component c = super.getTableCellRendererComponent(table, value, isSelected, hasFocus, row, column);
                setHorizontalAlignment(JLabel.CENTER);
                setBackground(new Color(245, 245, 245)); 
                setForeground(Color.BLACK); 
                setFont(boldFont);
                setBorder(BorderFactory.createMatteBorder(0, 0, 1, 1, Color.WHITE)); 
                return c;
            }
        };

        for (int i = 0; i < table.getColumnCount(); i++) {
            table.getColumnModel().getColumn(i).setHeaderRenderer(headerRenderer);
        }
        
        Dimension headerSize = jheader.getPreferredSize();
        headerSize.height = 35;
        jheader.setPreferredSize(headerSize);

        /* CONTENU/CELLULES DU TABLEAU */
        table.setRowHeight(30);

        DefaultTableCellRenderer cellRenderer = new DefaultTableCellRenderer() {
            @Override
            public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
                Component c = super.getTableCellRendererComponent(table, value, isSelected, hasFocus, row, column);
                setBorder(BorderFactory.createEmptyBorder(5, 12, 5, 5));

                if (row % 2 == 0) {
                    c.setBackground(lightBlue);
                } else {
                    c.setBackground(Color.WHITE);
                }

                return c;
            }
        };

        for (int i = 0; i < table.getColumnCount(); i++) {
            table.getColumnModel().getColumn(i).setCellRenderer(cellRenderer);
        }

        JScrollPane scrollPane = new JScrollPane(table);
    
        scrollPane.setBorder(BorderFactory.createEmptyBorder(10, 20, 10, 20)); //pour avoir des marges autour
        
        appli.add(scrollPane, BorderLayout.CENTER);

        frame.pack();
        frame.setVisible(true);
    }
}
