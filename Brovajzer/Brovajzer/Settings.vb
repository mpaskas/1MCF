Imports System
Imports System.IO
Public Class Settings
    Dim fname As String = Application.StartupPath() & "\conf.ini"
    Dim nesto(16) As String
    Private Sub Settings_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        Me.AcceptButton = Snimi
        citanje()

    End Sub
    Sub citanje()
        Dim i As Integer

        Using MyReader As New Microsoft.VisualBasic.FileIO.TextFieldParser(fname)

            MyReader.TextFieldType = FileIO.FieldType.Delimited
            MyReader.SetDelimiters(",")
            Dim currentRow As String()
            While Not MyReader.EndOfData
                'For i = 0 To 13

                currentRow = MyReader.ReadFields()
                Dim currentField As String
                For Each currentField In currentRow
                    nesto(i) = currentField

                    i = i + 1
                    ' MsgBox(currentField)
                Next
                ' Next
            End While
        End Using
        For i = 0 To 15
            'If nesto(i) <> "" Then

            '    'ispis &= nesto(i) & vbNewLine
            'End If

        Next
        txtAdresa.Text = nesto(0)
        txtBazaAdr.Text = nesto(1)
        txtBazaIme.Text = nesto(2)
        txtBazaUser.Text = nesto(3)
        txtBazaPass.Text = nesto(4)
        txtTabela.Text = nesto(5)
        txtPolje.Text = nesto(6)
        txtIDtag.Text = nesto(7)
        txtIDtag2.Text = nesto(8)
        txtPolje1.Text = nesto(9)
        txtID1tag.Text = nesto(10)
        txtID1tag2.Text = nesto(11)
        txtPolje2.Text = nesto(12)
        txtID2tag.Text = nesto(13)
        txtID2tag2.Text = nesto(14)
        txtMcf.Text = nesto(15)
        'Status.Text = ispis
    End Sub
    Sub upis()

        Using sw As New StreamWriter(File.Open(fname, FileMode.Truncate))
            'Using sw As New StreamWriter(File.Open(fname, FileMode.OpenOrCreate))
            sw.WriteLine(txtAdresa.Text & "," & txtBazaAdr.Text & "," & txtBazaIme.Text & "," & txtBazaUser.Text & "," & txtBazaPass.Text & "," & txtTabela.Text & "," & txtPolje.Text & "," & txtIDtag.Text & "," & txtIDtag2.Text & "," & txtPolje1.Text & "," & txtID1tag.Text & "," & txtID1tag2.Text & "," & txtPolje2.Text & "," & txtID2tag.Text & "," & txtID2tag2.Text & "," & txtMcf.Text)
        End Using
    End Sub

    Private Sub Snimi_Click(sender As Object, e As EventArgs) Handles Snimi.Click
        upis()
        Me.Close()
        Form1.citanje()
        Form1.Show()
    End Sub


   
    
 
End Class