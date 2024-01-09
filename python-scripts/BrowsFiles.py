import tkinter
from tkinter import filedialog
def browse_file  ():
    
    print('please browse chromeweb.exe drive file ...')
    main_win = tkinter.Tk()
    main_win.withdraw()

    main_win.overrideredirect(True)
    main_win.geometry('0x0+0+0')

    main_win.deiconify()
    main_win.lift()
    main_win.focus_force()

    #open file selector
    main_win.sourceFile  = filedialog.askopenfilename(parent=main_win,initialdir='/')
    title  = 'please select a dictionary'

    #close window after selection
    main_win.destroy()

    #return path
    return main_win.sourceFile
