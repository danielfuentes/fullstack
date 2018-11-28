*----------------------------------------------------------------------------
* Sistema......: Control de Vencimientos de polizas
* Programa.....: Poli101.prg
* Descripci¢n..: Programa que permite incluir, modificar, eliminar, anterior,
*                siguiente, buscar  registros  en  el  maestro  de  Personas
*                Naturales
*----------------------------------------------------------------------------
public tete
V_nrctto = space(04)
V_nac    = space(1)
V_ced    = space(9)
V_nomape = space(60)
V_fecemi = ctod(" ")
V_fecvto = ctod(" ")
V_tasa   = 0.00
V_ctoequ = 0.00
V_nomcia = space(2)
V_valpol = 0.00
V_vigdes = ctod(" ")
V_vighas = ctod(" ")
V_observ = space(90)
V_desfec = space(2)
salir = chr(255)
Close data
select 2
IF !P01_USE ('compa¥ia',.F.)
   RETURN
ENDIF
If opci = 1
  SELEC 1                                // Se abren las bases de datos
  IF !P01_USE ('poli001',.F.)
    RETURN
  ENDIF
  SET INDEX TO ipoli00,ipolice1,ipoli01
  Go bottom
Elseif opci = 2
  SELEC 1                                // Se abren las bases de datos
  IF !P01_USE ('poli002',.F.)
    RETURN
  ENDIF
  SET INDEX TO ipoli02,ipolice2,ipoli03
  Go bottom
Elseif opci = 3
  SELEC 1                                // Se abren las bases de datos
  IF !P01_USE ('poli003',.F.)
    RETURN
  ENDIF
  SET INDEX TO ipoli04,ipolice3,ipoli05
  Go bottom
Endif
poli101=SAVEBOX(20,01,24,79)
SET COLOR TO W/N
FONDO(CHR(178))
SET COLOR TO w+/w
BOXSHADOW(04,03,16,77)
set color to w/w
@ 22,01 say space(80)
set color to n/w,w/n
@ 22,05 say "Pers.Naturales"
@ 22,35 say "Pers.Jur¡dicas"
@ 22,61 say "Flota Empleados"
OPC = 1
Ventana1()                              // Despliega en pantalla los datos a ser solicitados
select 1
MODULO = 'poli101'
TIT01('Personas Naturales')
Declara1()
If reccount() <>0
   asigna1()                        // Asignaci¢n de variables
   Despleg1()                      // Lista de capturas de datos
Endif
Do while .t.
   select 1
   MODULO = 'crd20102'
   If opci = 1
     TIT01('Personas Naturales')
   Elseif opci = 2
     TIT01('Personas Jur¡dicas')
   Elseif opci = 3
     TIT01('Flota de Empleados')
   Endif
   Declara1()
   If reccount() <>0
       asigna1()                        // Asignaci¢n de variables
       Despleg1()                      // Lista de capturas de datos
   Endif
   opc  = Tomar()                      // Opci¢n de (INC,MOD,ELI,CON,SIG,ANT.)
   Do case
      Case opc = 0
            Clear gets
            Exit
      Case opc = 1                     // Rutina de inclusi¢n de registros
         If Acceso(X_C1)
            regisap = RECNO()
            Clear gets
            Declara1()
            Ventana1()                  // Despliega los datos a ser solicitados
            Despleg1()
           Do while .t.
            Acepta1()                  // Lista de todos los "Get"
            Read
            If readkey() = 12 .or. readkey() = 268  // Se determina si se presiono "Esc"
               go regisap
               exit
            Endif
            conf = Conforma('¨Incluir este registro? ')
            If conf = 1
               P01_APPEND()
               Replace nro_ctto  With V_nrctto
               Replace ced_iden  With V_nac+V_ced
               Replace nom_ape   With V_nomape
               Replace fec_emi   With V_fecemi
               Replace fec_vcto  With V_fecvto
               Replace tasa      With V_tasa
               Replace cto_equi  With V_ctoequ
               Replace nom_cia   With V_nomcia
               Replace val_pol   With V_valpol
               Replace vig_des   With V_vigdes
               Replace vig_has   With V_vighas
               Replace observ    With V_observ
               Commit
               Select 1
               exit
            Else
               unlock
               Loop
            Endif
           Enddo
         Else
            Clear gets
            Loop
         Endif
       Case opc = 2                    // Rutina de modificaci¢n de registros
          If  acceso(X_C2)
             If !P01_RLOCK()            // Activa ventana de error
                unlock
                Loop
             Endif
             regisap = Recno()              // Se almacena el registro apuntado
             Clear gets
             Modific1()
             READ
             If Readkey() = 12 .or. Readkey() = 268
                regisap = RECNO()
                go regisap
                unlock
                loop
             Endif
             Clear gets
             conf = Conforma('¨Conforme con los cambios? ')
             If conf = 1
               Replace nro_ctto  With V_nrctto
               Replace ced_iden  With V_ced
               Replace nom_ape   With V_nomape
               Replace fec_emi   With V_fecemi
               Replace fec_vcto  With V_fecvto
               Replace tasa      With V_tasa
               Replace cto_equi  With V_ctoequ
               Replace nom_cia   With V_nomcia
               Replace val_pol   With V_valpol
               Replace vig_des   With V_vigdes
               Replace vig_has   With V_vighas
               Replace observ    With V_observ
               Commit
               Select 1
             Else
                unlock
             Endif
          Endif
       Case opc = 3          // Rutina de eliminaci¢n de registros de la base
          If acceso(X_C3)
             If  !P01_RLOCK()
                unlock
                Loop
             Endif
             Select 1
             regisap = recno()
             clear gets
             conf = Conforma('¨En realidad desea eliminarlo? ')
             If conf = 1
                Delete
                commit
             Endif
             If !eof()
                skip
             Endif
             If eof() .and. !bof()
                skip -1
             Endif
             unlock
             Loop
          Endif
      Case opc = 4           // Rutina que permite ir al registro anterior
         regisap = recno()
         skip -1
         If bof()
            Do Centrar1 with 'Est  al principio del archivo'
            go regisap
         Endif
         Loop
      Case opc = 5           // Rutina que permite ir al registro siguiente
         regisap = recno()
         skip
         If eof()
            Do Centrar1 with 'Est  al final del archivo'
            GO regisap
         Endif
         Loop
      Case opc = 6             // Permite buscar un registro en particular
         regisap = recno()
         Clear gets
         Set cursor on
         Declara1()
         despleg1()
         If !Fsoli()           // Funci¢n que solicita el nro. del cliente
            Clear gets
            regisap = recno()
            go regisap
            Loop
         Endif
         Regisap = recno()
   Endcase
Enddo
Restbox(poli101)
Set cursor off
regisap = recno()
Close data
Return
*----------------------------------------------------------------------------
* Funciones usadas por esta aplicaci¢n
*----------------------------------------------------------------------------
Function Declara1            // Rutina que permite declarar las variables
V_nrctto = space(04)
V_nac    = space(1)
V_ced    = space(9)
V_nomape = space(60)
V_fecemi = ctod(" ")
V_fecvto = ctod(" ")
V_tasa   = 0.00
V_ctoequ = 0.00
V_nomcia = space(2)
V_valpol = 0.00
V_vigdes = ctod(" ")
V_vighas = ctod(" ")
V_observ = space(90)
v_desfec = space(2)
Return
*----------------------------------------------------------------------------
Function Ventana1             // Se despliejan los datos a ser solicitados
  set color to w/w
  @ 05,04 clear to 15,76
  set color to n/w
  @ 05,04 say "N£mero del Contrato.....:"
  @ 05,40 say "C‚dula / R.I.F....:"
  @ 06,04 say "Arrendatario............:"
  @ 07,04 say "Emisi¢n del Contrato....:"
  @ 08,04 say "Vencimiento del Contrato:"
  @ 09,04 say "Tasa de Interes.........:"
  @ 10,04 say "Costo del Equipo........:"
  @ 11,04 say "Compa¤¡a de Seguro......:"
  @ 12,04 say "Valor de la P¢liza......:"
  @ 13,04 say "Vigencia P¢liza Desde...:"
  @ 14,04 say "Vigencia P¢liza Hasta...:"
  @ 15,04 say "Observaciones...........:"
Return
*----------------------------------------------------------------------------
Function asigna1              // Rutina que permite la asignaci¢n de variables
V_nrctto = nro_ctto
V_ced    = ced_iden
V_nomape = nom_ape
V_fecemi = fec_emi
V_fecvto = fec_vcto
V_tasa   = tasa
V_ctoequ = cto_equi
V_nomcia = nom_cia
V_valpol = val_pol
V_vigdes = vig_des
V_vighas = vig_has
V_observ = observ
Return
*----------------------------------------------------------------------------
Function despleg1           // Despliega los datos por pantalla
   set color to w/w
   @ 05,29 say space(5)
   @ 05,59 say space(11)
   @ 06,29 clear to 15,76
   set color to n/w,w/n
   @ 05,29 say V_nrctto
   @ 05,59 say substr(V_ced,1,1)+'-'+substr(V_ced,2,9)
   @ 06,29 say substr(V_nomape,1,40)
   @ 07,29 say V_fecemi
   @ 08,29 say V_fecvto
   @ 09,29 say numstr(V_tasa,6)
   @ 10,29 say numstr(V_ctoequ,14)
   @ 11,29 say V_nomcia
   select 2
   go top
   locate for cdg_cia = V_nomcia
   If found()
     @ 11,33 say substr(des_cia,1,40)
   Endif
   select 1
   @ 12,29 say numstr(V_valpol,14)
   @ 13,29 say V_vigdes
   @ 14,29 say V_vighas
   @ 15,29 say substr(V_observ,1,40)
Return
*----------------------------------------------------------------------------
Function Acepta1              // Permite aceptar todos los datos por pantalla
   set color to n/w,n/w
   @ 05,29 get V_nrctto  picture "9999" valid Fnrocli(V_nrctto)
   @ 05,59 get V_nac      picture "!" valid Fnacion(V_nac)
   @ 05,61 get V_ced  picture "999999999" valid Fcediden(v_nac,V_ced)
   @ 06,29 get V_nomape picture "@!s40"
   @ 07,29 get V_fecemi valid Ffecemi(V_fecemi)
   @ 08,29 get V_fecvto valid Ffecvto(V_fecvto,V_fecemi)
   @ 09,29 get V_tasa picture "999.99" valid Ftasa(V_tasa)
   @ 10,29 get V_ctoequ picture "999,999,999.99" valid Fctoequi(V_ctoequ)
   @ 11,29 get V_nomcia picture "99" valid Fachoice(V_nomcia,'compa¥ia','icompa',11,29,11,33,'cdg_cia','des_cia',07,35,17,73,'')
   @ 12,29 get V_valpol picture "999,999,999.99" valid Fctoequi(V_valpol)
   @ 13,29 get V_vigdes valid Fvigdes(V_vigdes,V_fecemi,V_fecvto)
   select 1
   read
   V_vighas = substr(dtoc(V_vigdes),1,6)
   V_desfec = val(substr(dtoc(V_vigdes),7,2))+1
   V_vighas = V_vighas+alltrim(str(V_desfec))
   V_vighas =ctod(V_vighas)
   @ 14,29 get V_vighas valid Ffecvto1(V_vighas,V_vigdes)
   @ 15,29 get V_observ picture "@!S40"
Return .t.
*----------------------------------------------------------------------------
Function Modific1             // Funci¢n que permite que sean modificados registros
   Set color to to n/w,n/w
   V_nrctto = nro_ctto
   V_ced    = ced_iden
   @ 05,59 say substr(V_ced,1,1)+'-'+substr(V_ced,2,9)
   @ 05,29 say V_nrctto
   @ 06,29 get V_nomape picture "@!s40"
   @ 07,29 get V_fecemi valid Ffecemi(V_fecemi)
   @ 08,29 get V_fecvto valid Ffecvto(V_fecvto,V_fecemi)
   @ 09,29 get V_tasa picture "999.99" valid Ftasa(V_tasa)
   @ 10,29 get V_ctoequ picture "999,999,999.99" valid Fctoequi(V_ctoequ)
   @ 11,29 get V_nomcia picture "99" valid Fachoice(V_nomcia,'compa¥ia','icompa',11,29,11,33,'cdg_cia','des_cia',07,35,17,73,'')
   @ 12,29 get V_valpol picture "999,999,999.99" valid Fctoequi(V_valpol)
   @ 13,29 get V_vigdes valid Fvigdes(V_vigdes,V_fecemi,V_fecvto)
   @ 14,29 get V_vighas valid Ffecvto1(V_vighas,V_vigdes)
   @ 15,29 get V_observ picture "@!S40"
Return .t.
*----------------------------------------------------------------------------
Function Fnrocli(C)          // Funci¢n que determina si el cliente existe en la base
   select 1
   If empty(C)
      Return .t.
   Endif
   Seek C
   If opc = 6
      If !Found()
         Do centrar1 with 'Nro.Contrato no existe'
         V_nrctto = space(4)
         Set cursor on
         Return .f.
      Else
         regisap = recno()
         Return .t.
      Endif
   Else
     If !found()
         regisap = recno()
         Return .t.
     Else
         Do centrar1 with 'Nro.Contrato ya existe'
         V_nrctto = space(4)
         Set cursor on
         Return .f.
     Endif
  Endif
Return .t.
*----------------------------------------------------------------------------
Function Fsoli               // Rutina que permite solicitar un nuevo registro
   Set color to n/w,n/w
   @ 05,29 get V_nrctto  picture "9999" valid Fnrocli(V_nrctto)
   read
   If readkey()=12 .or. readkey()=268
        Return .f.
   Endif
   If V_nrctto = space(4)
     @ 05,59 get V_nac  picture "!" valid Fnacion(V_nac)
     @ 05,61 get V_ced  picture "999999999" valid Fcediden(v_nac,V_ced)
     read
   Endif
   If readkey()=12 .or. readkey()=268
        Return .f.
   Endif
Return .t.
*----------------------------------------------------------------------------
Function Ftasa(V)
  If lastkey() = 5
     Return .t.
  Endif
  If empty(V)
    Return .f.
  Endif
Return .t.
*----------------------------------------------------------------------------
Function Ffecemi(V)
  If lastkey() = 5
     Return .t.
  Endif
  If empty(V)
    Return .f.
  Endif
  If V > date()
    Do centrar1 with 'Fecha no puede ser mayor a la actual'
    return .f.
  Endif
Return .t.
*----------------------------------------------------------------------------
Function  Ffecvto(V1,V2)
  If lastkey() = 5
     Return .t.
  Endif
  If empty(V1)
    Return .f.
  Endif
  If V1 < V2
    Do centrar1 with 'Fecha no puede ser menor al vencimiento'
    Return .f.
  Endif
Return .t.
*----------------------------------------------------------------------------
Function Fctoequi(V)
  If lastkey() = 5
     Return .t.
  Endif
  If empty(V)
    Return .f.
  Endif
  If V = 0
    Do centrar1 with 'Monto no puede ser cero (0)'
    Return .f.
  Endif
Return .t.
*----------------------------------------------------------------------------
Function Fvigdes(V1,V2,V3)
  If lastkey() = 5
     Return .t.
  Endif
  If empty(V1)
    Return .f.
  Endif
*  If V1 < V2
*    Do centrar1 with 'Fecha no puede ser menor a la emisi¢n del Contrato'
*    Return .f.
*  Endif
Return .t.
*----------------------------------------------------------------------------
Function  Ffecvto1(V1,V2)
  If lastkey() = 5
     Return .t.
  Endif
  If empty(V1)
    Return .f.
  Endif
  If V1 < V2
    Do centrar1 with 'Fecha no puede ser menor a la vigencia'
    Return .f.
  Endif
Return .t.
*----------------------------------------------------------------------------
Function Fnacion(x_vnac)       // Funci¢n que valida la nacionalidad a incluir
   If lastkey() = 5
      Return .t.
   Endif
   If x_vnac # 'V'.and. x_vnac # 'E' .and. x_vnac # 'J'
      Do centrar1 with ' Utilize Solo las Opciones <V> - <E> - <J>'
      v_var = readvar()
      &v_var = "V"
      Set cursor on
      Return .f.
   Endif
Return .t.
*----------------------------------------------------------------------------
Function Fcediden(C,D)          // Funci¢n que determina si el cliente existe en la base
   If lastkey() = 5
      set order to 1
      Return .t.
   Endif
   If empty(D)
      Return .f.
   Endif
   C = C+D
   set order to 2
   Seek alltrim(C)
   If opc = 6
      If !Found()
         Do centrar1 with 'Cliente no existe'
         V_ced = space(9)
         Set cursor on
         Return .f.
      Else
         set order to 1
         regisap = recno()
         Return .t.
      Endif
   Else
      If Found()
        set orde to 1
        regisap = recno()
        return .t.
      Endif
   Endif
Return .t.
*----------------------------------------------------------------------------
*Funcion que determina el uso de la funci¢n achoice()
*Variables que recibe la funci¢n: variable,base datos,indice,fila del get
*columna del get,fila del say de la descripci¢n,columna del say de la descripci¢n,
*campo1 de la base,campo2 de la base,(fila,columna,fila,columna de achoice)
*Se retorna el resultado de la variable del achoice (x_var)
*ejemplo del llamado a la funci¢n: @ 15,22 get V_cdgbco picture "99" valid Fachoice(V_cdgbco,'banco','ibanco',15,22,15,26,'cdg_bco','des_bco',07,48,17,71,'')
*----------------------------------------------------------------------------
function Fachoice(x_var,x_bas,x_ind,x_fils,x_cols,x_fils1,x_cols1,x_cod,x_des,fili,coli,fild,cold,x_credhi)
   xx_var=readvar()
   color=setcolor()
   if lastkey()=5
      return .t.
   endif
   If lastkey()=27
    Return .t.
   Endif
   basact=select()
   If x_credhi='S'  // Solo se condiciona cuando un cr‚dito es hipotecario o no
    x_bas='obj_hip'
    x_ind='iobjcrd'
   Endif
   sele 14
   if !p01_use(x_bas,.f.)
      return .f.
   endif
   set index to &x_ind
   seek x_var
   if !found()
      go top
      scr1=savescreen(03,01,24,79)
      set color to n/w,w/n
      sw1=.f.
      declare aRR[reccount()]
      i=0
      do while !eof()
         i=i+1
         aRR[i]=&x_cod+" "+&x_des
         skip
      enddo
      boxshadow(fili-1,coli-1,fild+1,cold+1)
      do while .t.
         cod_des=achoice(fili,coli,fild,cold,aRR,.t.)
         if lastkey()=19 .or. lastkey()=4
            loop
         endif
         If lastkey()=27  // Se determina si se presiono "Esc"
           set cursor on
           restscreen(03,01,24,79,scr1)
           select &basact
           return .f.
         endif
         if !sw1
            x_var=substr(aRR[cod_des],1,len(&x_cod))
            seek x_var
            if found()
               xx_des=x_des
            endif
            exit
         endif
      enddo
      set cursor on
      restscreen(03,01,24,79,scr1)
      set color to n/w,n/w
      @ x_fils,x_cols say x_var
      @ x_fils1,x_cols1 say &xx_des pict "@!"
      if sw1
         return .f.
      else
         setcolor(color)
         &xx_var=x_var
         select &basact
         return .t.
      endif
   else
      xx_des=x_des
      set color to n/w,n/w
      @ x_fils,x_cols say x_var
      @ x_fils1,x_cols1 say &xx_des pict "@!"
      setcolor(color)
      select &basact
      return .t.
   endif
return .t.
*----------------------------------------------------------------------------


