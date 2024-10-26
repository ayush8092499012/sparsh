<div class="container">
    <div class="form-title">
        <h2>Candidate Application Form</h2>
    </div>
    <form id="candidateForm">
        <div class="form-group">
            <label class="form-label" for="name">Candidate Name:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Enter candidate's name"
                onkeyup="validateName()">
            <div class="error" id="nameError"></div>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Candidate Email:</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Enter candidate's email"
                onkeyup="validateEmail()">
            <div class="error" id="emailError"></div>
        </div>

        <div class="form-group">
            <label class="form-label" for="position">Position Applied:</label>
            <input class="form-control" type="text" id="position" name="position"
                placeholder="Enter position applied for" onkeyup="validatePosition()">
            <div class="error" id="positionError"></div>
        </div>

        <div class="form-group">
            <label class="form-label">Status:</label>
            <div class="status-group">
                <input type="radio" id="selected" name="status" value="1" onchange="validateStatus()">
                <label class="form-label ml-1" for="selected">Selected</label>

                <input class="ml-2" type="radio" id="rejected" name="status" value="0" onchange="validateStatus()">
                <label class="form-label ml-1" for="rejected">Rejected</label>
            </div>
            <div class="error" id="statusError"></div>
        </div>

        <div class="form-group">
            <button type="button" class="preview-btn" id="previewBtn" onclick="validateForm()">Preview</button>
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h4>Preview Template</h4>
                        <span class="close-btn">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p id="templateData">This is where your template data will be displayed.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="sendBtn" name="sendBtn"><i class="fa-solid fa-paper-plane"></i> Send</button>
                        <button class="close-btn">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </form>
</div>