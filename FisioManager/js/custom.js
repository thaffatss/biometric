//MODAL Confirme Delete indexCliente.php
$(document).ready(function() {
    $('a[data-confirm-del]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">DELETAR PACIENTE <i class="bi bi-x-octagon" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EXCLUIR o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmDel" class="btn btn-danger text-white">Deletar</a></div></div</div</div>');
        }
        $('#dataConfirmDel').attr('href', href)
        $('#confirm-delete').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Edite indexCliente.php
$(document).ready(function() {
    $('a[data-confirm-edit]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-edit').length) {
            $('body').append('<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">EDITAR PACIENTE <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EDITAR esse item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmEdit" class="btn btn-warning text-white">Editar</a></div></div</div</div>');
        }
        $('#dataConfirmEdit').attr('href', href)
        $('#confirm-edit').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Edite indexUsuarioAtivos.php
$(document).ready(function() {
    $('a[data-confirm-edit-user]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-edit-user').length) {
            $('body').append('<div class="modal fade" id="confirm-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">EDITAR USUÁRIO <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EDITAR o usuário selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmEditUser" class="btn btn-warning text-white">Editar</a></div></div</div</div>');
        }
        $('#dataConfirmEditUser').attr('href', href)
        $('#confirm-edit-user').modal({shown:true});
        return false;
    });
});
//MODAL Confirme disabled indexUsuarioAtivos.php
$(document).ready(function() {
    $('a[data-confirm-disable-user]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-disable-user').length) {
            $('body').append('<div class="modal fade" id="confirm-disable-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">DESABILITAR USUÁRIO <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja DESABILITAR o usuário selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmDisableUser" class="btn btn-warning text-white">Desabilitar</a></div></div</div</div>');
        }
        $('#dataConfirmDisableUser').attr('href', href)
        $('#confirm-disable-user').modal({shown:true});
        return false;
    });
});

//MODAL Confirme enabled indexUsuarioInativos.php
$(document).ready(function() {
    $('a[data-confirm-enabled-user]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-enabled-user').length) {
            $('body').append('<div class="modal fade" id="confirm-enabled-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">DESABILITAR USUÁRIO <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja habilitar o usuário selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmEnabledUser" class="btn btn-warning text-white">Habilitar</a></div></div</div</div>');
        }
        $('#dataConfirmEnabledUser').attr('href', href)
        $('#confirm-enabled-user').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Pagamento
$(document).ready(function() {
    $('a[data-confirm-payment]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-payment').length) {
            $('body').append('<div class="modal fade" id="confirm-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">CONFIRMAR PAGAMENTO <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja CONFIRMAR o pagamento?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmPayment" class="btn btn-warning text-white">CONFIRMAR</a></div></div</div</div>');
        }
        $('#dataConfirmPayment').attr('href', href)
        $('#confirm-payment').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Pagamento
$(document).ready(function() {
    $('a[data-confirm-payment-error]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-payment').length) {
            $('body').append('<div class="modal fade" id="confirm-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">CONFIRMAR PAGAMENTO <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja CONFIRMAR o pagamento?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmPayment" class="btn btn-warning text-white">CONFIRMAR</a></div></div</div</div>');
        }
        $('#dataConfirmPayment').attr('href', href)
        $('#confirm-payment').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Delete indexReceitas.php
$(document).ready(function() {
    $('a[data-confirm-del-receita]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">DELETAR RECEITA <i class="bi bi-x-octagon" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EXCLUIR o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmDel" class="btn btn-danger text-white">Deletar</a></div></div</div</div>');
        }
        $('#dataConfirmDel').attr('href', href)
        $('#confirm-delete').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Edite indexReceitas.php
$(document).ready(function() {
    $('a[data-confirm-edit-receita]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-edit').length) {
            $('body').append('<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">EDITAR RECEITA <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EDITAR esse item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmEdit" class="btn btn-warning text-white">Editar</a></div></div</div</div>');
        }
        $('#dataConfirmEdit').attr('href', href)
        $('#confirm-edit').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Delete indexDespesas.php
$(document).ready(function() {
    $('a[data-confirm-del-despesa]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">DELETAR DESPESA <i class="bi bi-x-octagon" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EXCLUIR o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmDel" class="btn btn-danger text-white">Deletar</a></div></div</div</div>');
        }
        $('#dataConfirmDel').attr('href', href)
        $('#confirm-delete').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Edite indexDespesas.php
$(document).ready(function() {
    $('a[data-confirm-edit-despesa]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-edit').length) {
            $('body').append('<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">EDITAR DESPESA <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja EDITAR esse item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmEdit" class="btn btn-warning text-white">Editar</a></div></div</div</div>');
        }
        $('#dataConfirmEdit').attr('href', href)
        $('#confirm-edit').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Open indexCliente_Pilates.php
$(document).ready(function() {
    $('a[data-confirm-open]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-open').length) {
            $('body').append('<div class="modal fade" id="confirm-open" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">DESTRANCAR MENSALISTA<i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja DESTRANCAR mensalidade?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmOpen" class="btn btn-warning text-white">Destrancar</a></div></div</div</div>');
        }
        $('#dataConfirmOpen').attr('href', href)
        $('#confirm-open').modal({shown:true});
        return false;
    });
});

//MODAL Confirme Block indexCliente_Pilates.php
$(document).ready(function() {
    $('a[data-confirm-block]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-block').length) {
            $('body').append('<div class="modal fade" id="confirm-block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">TRANCAR MENSALISTA<i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja TRANCAR mensalidade?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmBlock" class="btn btn-warning text-white">Trancar</a></div></div</div</div>');
        }
        $('#dataConfirmBlock').attr('href', href)
        $('#confirm-block').modal({shown:true});
        return false;
    });
});

//MODAL Confirme disabled cliente.php
$(document).ready(function() {
    $('a[data-confirm-disabled-paciente]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-disabled-paciente').length) {
            $('body').append('<div class="modal fade" id="confirm-disabled-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">DESABILITAR PACIENTE <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja DESABILITAR o paciente selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmDisabledPaciente" class="btn btn-warning text-white">Desabilitar</a></div></div</div</div>');
        }
        $('#dataConfirmDisabledPaciente').attr('href', href)
        $('#confirm-disabled-paciente').modal({shown:true});
        return false;
    });
});

//MODAL Confirme disabled cliente.php
$(document).ready(function() {
    $('a[data-confirm-enabled-paciente]').click(function(ev) {
        var href = $(this).attr('href');
        if(!$('#confirm-enabled-paciente').length) {
            $('body').append('<div class="modal fade" id="confirm-enabled-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-warning text-white">HABILITAR PACIENTE <i class="bi bi-exclamation-triangle" style="margin-left:5px;"></i><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja HABILITAR o paciente selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button><a id="dataConfirmEnabledPaciente" class="btn btn-warning text-white">Habilitar</a></div></div</div</div>');
        }
        $('#dataConfirmEnabledPaciente').attr('href', href)
        $('#confirm-enabled-paciente').modal({shown:true});
        return false;
    });
});

// Função gera página para impressão.
function closePrint () {
    document.body.removeChild(this.__container__);
  }
  
  function setPrint () {
    this.contentWindow.__container__ = this;
    this.contentWindow.onbeforeunload = closePrint;
    this.contentWindow.onafterprint = closePrint;
    this.contentWindow.focus(); // Required for IE
    this.contentWindow.print();
  }
  
  function printPage (sURL) {
    var oHiddFrame = document.createElement("iframe");
    oHiddFrame.onload = setPrint;
    oHiddFrame.style.position = "fixed";
    oHiddFrame.style.right = "0";
    oHiddFrame.style.bottom = "0";
    oHiddFrame.style.width = "0";
    oHiddFrame.style.height = "0";
    oHiddFrame.style.border = "0";
    oHiddFrame.src = sURL;
    document.body.appendChild(oHiddFrame);
  }
  
