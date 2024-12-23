const createDialog = document.getElementById("createDialog");
const deleteDialog = document.getElementById("deleteDialog");
const delNoteName = document.getElementById("delNoteName");

function ShowCreateDialog()
{
    createDialog.showModal();
}

function CloseCreateDialog()
{
    createDialog.close();
}

function ShowDeleteDialog(noteName)
{
    delNoteName.value = noteName;
    deleteDialog.showModal();
}

function CloseDeleteDialog()
{
    deleteDialog.close();
}
