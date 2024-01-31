import tkinter as tk

def main():
    # Create the main window
    window = tk.Tk()

    # Set the window title
    window.title("GRATSPIEL")

    # Set the size of the window
    window.geometry("200x50")  # Width x Height

    # Set the Text
    label = tk.Label(window, text="1000 VIREN WURDEN INSTALLIERT")

    # Pack the label to make it visible in the window
    label.pack()

    # Start the Tkinter event loop
    window.mainloop()

if __name__ == "__main__":
    main()
