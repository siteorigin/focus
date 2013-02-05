/**
 * Focus video admin
 *
 * Copyright 2013, Greg Priday
 * Released under GPL 2.0 - see http://www.gnu.org/licenses/gpl-2.0.html
 */

jQuery(function($){
    $('.focus-video-table' ).each(function(i, el){
        var $$ = $(el);
        $$.find('.field' ).hide();

        $$.find('.focus-video-type-select' ).change(function(){
            $$.find('.field' ).hide();
            $$.find('.field-' + $(this ).val() ).show();
        } ).change();
    });
    
    
    
    var restoreSendAttachment = function(){
        if(restoreSendAttachment.original != null){
            // Restore the media_send_attachment value
            wp.media.editor.send.attachment = restoreSendAttachment.original;
            wp.media.view.l10n.insertIntoPost = restoreSendAttachment.buttonText;
            $('.media-modal .media-button-insert' ).html(wp.media.view.l10n.insertIntoPost);
            
            restoreSendAttachment.original = null;
        }
    }
    
    // Restore the original attachment function when we escape the modal
    wp.media.view.Modal.prototype.bind('escape', restoreSendAttachment);
    
    // Enable custom media handling
    $('.focus-add-video' ).each(function(){
        var $$ = $(this);
        
        $$.click(function(event){
            event.preventDefault();
            
            // Open the media editor
            restoreSendAttachment.original = wp.media.editor.send.attachment;
            restoreSendAttachment.buttonText = wp.media.view.l10n.insertIntoPost;
            
            
            wp.media.editor.send.attachment = function(props, attachment){
                var $f = $('.focus-video-table .field-' + $$.attr('data-video-type') + '-self');
                $f.find('strong' ).html(attachment.title);
                $f.find('.field-video-self' ).val(attachment.id);
                
                // Restore the original send attachment function
                restoreSendAttachment();
            };
            wp.media.view.l10n.insertIntoPost = focusVideoSettings.button;
            
            wp.media.editor.open('content');
            $('.media-modal .media-button-insert' ).html(wp.media.view.l10n.insertIntoPost);
            
            return false;
        });
    });
})