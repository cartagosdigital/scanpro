/**
 * Scan Pro — Kontaktformular
 *
 * Envia o formulário por AJAX ao Web3Forms e mostra o resultado na própria
 * página, sem recarregar. Os textos vêm de PHP (scanproKontakt), para
 * continuarem traduzíveis.
 */
( function () {
  'use strict';

  var form = document.getElementById( 'contact-form' );
  if ( ! form ) {
    return;
  }

  var notice = document.getElementById( 'contact-form-notice' );
  var button = form.querySelector( '.form-submit' );
  var labels = window.scanproKontakt || {};
  var buttonText = button ? button.innerHTML : '';

  function showNotice( type, message ) {
    if ( ! notice ) {
      return;
    }
    notice.className = 'form-notice form-notice--' + type;
    notice.textContent = message;
    notice.hidden = false;
    notice.scrollIntoView( { behavior: 'smooth', block: 'center' } );
  }

  function setBusy( busy ) {
    if ( ! button ) {
      return;
    }
    button.disabled = busy;
    button.innerHTML = busy ? ( labels.sending || '…' ) : buttonText;
  }

  form.addEventListener( 'submit', function ( event ) {
    event.preventDefault();

    // O formulário tem novalidate: dispara a validação nativa manualmente.
    if ( typeof form.reportValidity === 'function' && ! form.reportValidity() ) {
      return;
    }

    var payload = {};
    new FormData( form ).forEach( function ( value, key ) {
      payload[ key ] = value;
    } );

    if ( ! payload.access_key ) {
      showNotice( 'error', labels.error || '' );
      return;
    }

    setBusy( true );

    fetch( 'https://api.web3forms.com/submit', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json'
      },
      body: JSON.stringify( payload )
    } )
      .then( function ( response ) {
        return response.json();
      } )
      .then( function ( result ) {
        if ( result && result.success ) {
          form.hidden = true;
          showNotice( 'success', labels.success || '' );
        } else {
          setBusy( false );
          showNotice( 'error', labels.error || '' );
        }
      } )
      .catch( function () {
        setBusy( false );
        showNotice( 'error', labels.error || '' );
      } );
  } );
} )();
