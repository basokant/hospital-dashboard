# hospital-dashboard

A hospital dashboard built for a database class assignment. Used MySQL, PHP, and Bootstrap.

## Features

- List all the information about the doctors.  Allow the user to order the data by Last Name OR by Birthdate(you might want to use a radio button for this choice).  For each of these 2 fields (Last Name or Birthdate)  allow the user to either order them in ascending or descending order (you could also use a radio button for this choice).
- Allow the user to select one of the specialties and then list all the doctor information about just doctors with this specialty. Your code should only list the specialties that currently exist in the doctor table.
- Insert a new doctor. Prompt for the necessary data.  The user may type in the hospital code directly or pick from a list of hospitals.  Note: if the user types in an existing doctor license number, your program should output an error message and not let the new doctor be added. If the user types in a non- existent hospital code, then give an error message.  The user may add a new specialty for this doctor so just use a textbox for this field. 
- Delete an existing doctor. Either prompt for the doctor license number or you could display the list of doctors and allow the user to pick the one they want to delete. If you decide to prompt for the license number, make sure you remember to give an error message if the user tries to delete a non-existent doctor. If the doctor is treating patients or the head of a hospital, output a message that you cannot delete the doctor.  Also remember that any permanent deletions should always allow the user the chance to back out (e.g. "Are you sure you want to delete this doctor?")
- Assign a doctor to a patient. Do not allow this if the relationship already exists (output a warning like "Patient already assigned to this doctor"). Allow the user to select a doctor and a patient and then create the relationship.  
- Allow the user to select a doctor and see the first and last name and ohip number of any patient treated by that doctor. 
- Allow the user to select a hospital and display a hospital name, city, province, number of beds, and head doctor first and last name and then list all the doctors (first and last name) that work at that hospital.
- Allow the user to select a hospital and change (UPDATE) the number of beds at that hospital.
