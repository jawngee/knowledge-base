'use strict';

declare var grecaptcha:any;
declare var jQuery:any;

export default class SubmitIssue {
    private modal:HTMLElement;
    private form:HTMLFormElement;

    constructor() {
        document.querySelectorAll('a.submit-issue').forEach((ele: HTMLElement) => {
           ele.addEventListener('click', (e:Event) => {
               e.preventDefault();

               this.show();

               return false;
           })
        });

        this.modal = document.getElementById('submit-issue-modal');
        this.form = this.modal.querySelector('form');
        this.form.addEventListener('submit', (e:Event) => {
             e.preventDefault();

             this.submitIssue();

             return false;
        });

        this.modal.querySelector('a.cancel-modal').addEventListener('click', (e:Event) => {
            e.preventDefault();

            this.hide();

            return false;
        });
    }

    show() {
        document.body.classList.add('no-scroll');
        grecaptcha.reset();
        this.form.reset();
        this.modal.classList.remove('hidden');
    }

    hide() {
        document.body.classList.remove('no-scroll');
        this.modal.classList.add('hidden');
    }

    submitIssue() {
        let formData = new FormData(this.form);
        jQuery.ajax({
            url: '/issues/submit',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: this.submitSuccess.bind(this),
            error: this.submitError.bind(this)
        });
    }

    submitSuccess(response) {
        alert("Thanks for submitting your question or issue!  All follow up will be via email.");

        this.hide();
    }

    submitError() {
        alert("There was an error submitting your question or issue.  Please wait a few minutes and then try again.");
    }
}