
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Promotional Email to All Customers</div>
                <div class="card-body">
                    <form id="sent-form">
                        <div class="form-group">
                            <label for="subject">Email Subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Email Content:</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <button onclick="sendMail()" type="button" class="btn btn-primary">Send Email to All Customers</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function sendMail() {
       
        

        try {
            let subject = document.getElementById('subject').value;
        let content = document.getElementById('content').value;

        if(subject.length === 0){
            errorToast('Subject Required');
        }else if(content.length === 0){
            errorToast('Content Required');
        }else{
            showLoader();
            const response = await axios.post('/send_promotional_email_all', {
                subject: subject,
                content: content
            });
            hideLoader();
       
            successToast(response.data);
            document.getElementById('sent-form').reset();
            
           // alert(response.data); // Show success message

        }
           
        } catch (error) {
            errorToast('Error sending promotional email.');
            hideLoader();
          
        }
    }
</script>

