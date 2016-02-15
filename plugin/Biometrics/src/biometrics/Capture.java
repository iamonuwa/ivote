/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package biometrics;

import com.digitalpersona.onetouch.DPFPFingerIndex;
import com.digitalpersona.onetouch.DPFPTemplate;
import com.yellowbambara.fingerprint.FingerPrintReaderDialog;
import com.yellowbambara.fingerprint.Mode;
import java.awt.HeadlessException;
import java.io.IOException;
import java.sql.SQLException;
import java.util.EnumMap;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.Icon;
import javax.swing.ImageIcon;
import javax.swing.JOptionPane;

/**
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
public class Capture extends javax.swing.JFrame {

    private Status mode;

    /**
     * Creates new form Capture
     */
    public Capture() {
        initComponents();
    }

    private void readFingerPrint() {
        Runnable runnable = () -> {
            try {
                enroll();
            } catch (IOException e) {
                Logger.getLogger(Capture.class.getName()).log(Level.SEVERE, null, e);
                JOptionPane.showMessageDialog(this, "Oops! Something went wrong\n"
                        + "Response was not sent to server");
            } catch (HeadlessException | AssertionError e) {
                JOptionPane.showMessageDialog(this, "Oops! Something went wrong");
                Logger.getLogger(Capture.class.getName()).log(Level.SEVERE, null, e);
            }
        };
        Utility.getExecutor().execute(runnable);
    }
    
     private void verify() throws IOException {
//       try {
//            EnumMap<DPFPFingerIndex, DPFPTemplate> fingerPrint = DatabaseImpl.getInstance().getFingerPrint(staffID);
            FingerPrintReaderDialog dialog = new FingerPrintReaderDialog(this,
                    Mode.VERIFICATION);
            boolean verified = dialog.isVerified();
            setVerified(verified);
//            try {
//                connection.sendReply(verified ? WebConnection.ReplyType.PASSED : WebConnection.ReplyType.FAILED);
//            } catch (IOException e) {
//                setVerified(false);
//                throw e;
//            }
//        } catch (IOException | SQLException ex) {
//            setVerified(false);
//            connection.sendReply(WebConnection.ReplyType.FAILED);
//            Logger.getLogger(MainFrame.class.getName()).log(Level.SEVERE, null, ex);
//            JOptionPane.showMessageDialog(this, "Oops! Something went wrong");
//        }
    }
    
    private void enroll() throws IOException {
       FingerPrintReaderDialog dialog = new FingerPrintReaderDialog(this, Mode.ENROLLMENT);
        EnumMap<DPFPFingerIndex, DPFPTemplate> template = dialog.getTemplates();
        if (!template.isEmpty()) {
            System.out.println(template.values());
        } else {
            setVerified(false);
//            connection.sendReply(WebConnection.ReplyType.FAILED);
        }
    }
    
    public void setMode(Status mode){
        this.mode = mode;
        switch(mode){
            case ENROLLMENT:
                continueButton.setEnabled(false);
//                fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics_enrol.png")));
                break;
            case VERIFICATION:
                continueButton.setEnabled(false);
//                fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics.png")));
                break;
            case NULL:
                 continueButton.setEnabled(true);
                 JOptionPane.showMessageDialog(this, "No Request was sent from the Server");
                 break;
            default:
                throw new AssertionError(mode.name());
        }
    }
    
    private void setVerified(boolean status) {
        if (status == true) {
            switch (mode) {
                case VERIFICATION:
//                    fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics_passed.png")));
                    break;
                case ENROLLMENT:
//                    fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics_enrol_passed.png")));
                    break;
                default:
                    throw new AssertionError(mode.name());
            }
        } else {
            switch (mode) {
                case VERIFICATION:
//                    fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics_failed.png")));
                    break;
                case ENROLLMENT:
//                    fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics_enrol_failed.png")));
                    break;
                default:
                    throw new AssertionError(mode.name());
            }
        }
    }
     private void setBusy(boolean state, String message) {
//        loadLabel.setText(message);
//        loadLabel.setVisible(state);
    }
     
    private void reset() {
//        fingerPrintLabel.setIcon(new ImageIcon(getClass().getResource("resources/biometrics.png")));
        setBusy(false, "");
    }
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        continueButton = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(new java.awt.Color(255, 255, 255));
        setResizable(false);
        setType(java.awt.Window.Type.POPUP);

        continueButton.setIcon(new javax.swing.ImageIcon(getClass().getResource("/resources/web_20.png"))); // NOI18N
        continueButton.setText("Read Fingerprint");
        continueButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                continueButtonActionPerformed(evt);
            }
        });

        jLabel1.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel1.setText("iVoter Fingerprint Scanner");

        jLabel2.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel2.setText("ver 0.1.0 (beta)");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(continueButton, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(21, 21, 21)
                                .addComponent(jLabel1))
                            .addGroup(layout.createSequentialGroup()
                                .addGap(49, 49, 49)
                                .addComponent(jLabel2)))
                        .addGap(0, 10, Short.MAX_VALUE)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel2)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(continueButton, javax.swing.GroupLayout.PREFERRED_SIZE, 44, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void continueButtonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_continueButtonActionPerformed
        readFingerPrint();
    }//GEN-LAST:event_continueButtonActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Capture.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Capture.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Capture.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Capture.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Capture().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton continueButton;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    // End of variables declaration//GEN-END:variables
}
