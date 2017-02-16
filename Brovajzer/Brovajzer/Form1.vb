Imports MySql.Data.MySqlClient
Imports System
'Imports System.Windows.Forms
Imports System.IO
'Imports System.IO.FileSystemEventArgs


Public Class Form1
    Dim fname As String = Application.StartupPath() & "\conf.ini"
    Dim cmd As New MySqlCommand
    Dim da As New MySqlDataAdapter
    Dim dr As MySqlDataReader
    Dim ds, ds1 As New DataSet
    Dim conn As New MySqlConnection
    Dim nesto(16) As String
    Dim ed(3) As String
    


    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load

        'WebBrowser1.ScriptErrorsSuppressed = True
        'Timer1.Start()


        If File.Exists(fname) = False Then
            File.Create(fname).Dispose()
            File.SetAttributes(fname, FileAttribute.Hidden)

        End If
        citanje()
        connect()


    End Sub
    Private Sub WebBrowser1_DocumentCompleted(sender As Object, e As WebBrowserDocumentCompletedEventArgs) Handles WebBrowser1.DocumentCompleted

        conn.Open()


        If (nesto(8) = "") Then
            Try
                ed(0) = WebBrowser1.Document.GetElementById(nesto(7)).InnerHtml
                ed(1) = WebBrowser1.Document.GetElementById(nesto(10)).InnerHtml
                ed(2) = WebBrowser1.Document.GetElementById(nesto(13)).InnerHtml

                MsgBox(ed(0))
                '& " " & ed(1) & " " & ed(2)

            Catch ex As Exception
                MsgBox("nema id-a")
            End Try
        Else

            For g As Integer = 0 To 23
                Try
                    ed(0) = WebBrowser1.Document.GetElementById(nesto(7) & g & nesto(8)).InnerHtml
                    ed(1) = WebBrowser1.Document.GetElementById(nesto(10) & g & nesto(11)).InnerHtml
                    ed(2) = WebBrowser1.Document.GetElementById(nesto(13) & g & nesto(14)).InnerHtml


                Catch ex As Exception
                    Exit For
                End Try
                upisBaza()

                'MsgBox(ed(1))
                'MsgBox(ed(0) & " " & ed(1) & " " & ed(2))

                'g += 1
                'Console.WriteLine(g)

            Next
        End If
        conn.Close()
    End Sub

   

   

    Sub citanje()
        Dim i As Integer

        Dim ispis As String = ""
        Using MyReader As New Microsoft.VisualBasic.FileIO.TextFieldParser(fname)

            MyReader.TextFieldType = FileIO.FieldType.Delimited
            MyReader.SetDelimiters(",")
            Dim currentRow As String()
            While Not MyReader.EndOfData

                currentRow = MyReader.ReadFields()
                Dim currentField As String
                For Each currentField In currentRow
                    nesto(i) = currentField

                    i = i + 1
                    ' MsgBox(currentField)
                Next

            End While
        End Using

        For i = 0 To 15
            If nesto(i) <> "" Then
                ispis &= nesto(i) & vbNewLine
            End If
        Next
        WebBrowser1.Navigate(nesto(0))
        WebKitBrowser1.Navigate(nesto(15))
        'MsgBox(nesto(0))
        'TextBox1.Text = ispis
    End Sub
   
    Public Sub connect()

        Dim server As String = nesto(1)
        Dim DatabaseName As String = nesto(2)
        Dim userName As String = nesto(3)
        Dim password As String = nesto(4)
        If Not conn Is Nothing Then conn.Close()
        conn.ConnectionString = String.Format("server={0}; user id={1}; password={2}; database={3}; Character Set=utf8;", server, userName, password, DatabaseName)
        'Try
        '    conn.Open()




        '    MsgBox("Connected")
        'Catch ex As Exception
        '    MsgBox(ex.Message)
        'End Try
       
       
        
        'Try
        '    ds.Clear()
        '    conn.Open()
        '    cmd = New MySqlCommand("select * from druga", conn)
        '    da = New MySqlDataAdapter(cmd)
        '    da.Fill(ds, "druga")

        'Catch ex As Exception
        '    MsgBox(ex.Message)
        'Finally
        '    conn.Close()
        'End Try

        'conn.Close()


    End Sub

   
    

    Public Sub upisBaza()


        Dim Command = New MySqlCommand("INSERT ignore INTO " & nesto(5) & " (" & nesto(6) & "," & nesto(9) & "," & nesto(12) & ") VALUES(" & Convert.ToInt32(ed(0)) & ",(select ID from tipovi where naziv = '" & ed(1) & "')," & ed(2) & ")  ")
        Command.Connection = conn
        Command.ExecuteNonQuery()
       
    End Sub


    '   



    'Private Sub Button4_Click(sender As Object, e As EventArgs) Handles Button4.Click
    '    Dim j = 0
    '    Dim k = 0
    '    Try
    '        While ds.Tables("druga").Rows(j).Item(k) IsNot Nothing
    '            Try
    '                While ds.Tables(0).Rows(j).Item(k) IsNot Nothing
    '                    TextBox2.AppendText(ds.Tables("druga").Rows(j).Item(k))
    '                    j += 1
    '                End While
    '            Catch ex As Exception

    '            End Try
    '            TextBox2.AppendText("  ")
    '            j = 0
    '            k += 1
    '        End While
    '    Catch ex As Exception
    '        MsgBox("ne postoji")
    '    End Try


    'End Sub




   

    'Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
    '    Try
    '        MsgBox(WebBrowser1.Document.GetElementById("proba").GetAttribute("value"))
    '    Catch ex As Exception

    '    End Try

    'End Sub

   
    Private Sub SettingsToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles SettingsToolStripMenuItem.Click
        Me.Hide()
        Pass.Show()
    End Sub

    
    Private Sub Back_Click(sender As Object, e As EventArgs) Handles Back.Click
        WebBrowser1.GoBack()
    End Sub

   
End Class
