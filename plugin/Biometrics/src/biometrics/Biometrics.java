/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package biometrics;

import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
public class Biometrics {

    public static void main(String[] args) {
        try {
            Utility.initFromFile();
            Capture capture = new Capture();
            Utility.centreOnScreen(capture);
            capture.setVisible(true);
        } catch (Exception e) {
            Logger.getLogger(Biometrics.class.getName()).log(Level.SEVERE, null, e);
            JOptionPane.showMessageDialog(null, "Failed to initialize from file\n"
                    + "Reason:\n"
                    + e.getMessage());
        }
    }
    
}
