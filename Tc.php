<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College TC Generator</title>
    <link rel="stylesheet" href="TC.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>College Transfer Certificate Generator</h1>
        <p class="subtitle">Create a TC for students instantly!</p>

        <form id="tcForm">
            <div class="form-group">
                <label for="studentName">Student Full Name</label>
                <input type="text" id="studentName" name="studentName" placeholder="e.g., John Doe" required>
            </div>
            <div class="form-group">
                <label for="rollNumber">Roll Number</label>
                <input type="text" id="rollNumber" name="rollNumber" placeholder="e.g., CS12345" required>
            </div>
            <div class="form-group">
                <label for="course">Course/Program</label>
                <input type="text" id="course" name="course" placeholder="e.g., B.Tech Computer Science" required>
            </div>
            <div class="form-group">
                <label for="collegeName">College Name</label>
                <input type="text" id="collegeName" name="collegeName" placeholder="e.g., XYZ College" required>
            </div>
            <div class="form-group">
                <label for="issueDate">Issue Date</label>
                <input type="date" id="issueDate" name="issueDate" required>
            </div>
            <div class="form-group">
                <label for="reason">Reason for Leaving</label>
                <input type="text" id="reason" name="reason" placeholder="e.g., Course Completion" required>
            </div>
            <button type="submit">Generate TC</button>
        </form>

        <div id="result" class="result hidden">
            <h2>Generated Transfer Certificate</h2>
            <pre id="tcOutput"></pre>
            <div class="button-group">
                <button id="downloadBtn">Download as Text</button>
                <button id="resetBtn">Generate Another</button>
            </div>
            <p id="message"></p>
        </div>
    </div>

    <script>
        document.getElementById('tcForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const studentName = document.getElementById('studentName').value;
            const rollNumber = document.getElementById('rollNumber').value;
            const course = document.getElementById('course').value;
            const collegeName = document.getElementById('collegeName').value;
            const issueDate = document.getElementById('issueDate').value;
            const reason = document.getElementById('reason').value;

            if (!studentName || !rollNumber || !course || !collegeName || !issueDate || !reason) {
                document.getElementById('message').textContent = 'Please fill all fields!';
                document.getElementById('message').style.color = '#dc3545';
                return;
            }

            const tcText = `
                TRANSFER CERTIFICATE
                ${collegeName.toUpperCase()}
                [Affiliated to Your University Name]

TC No: ${rollNumber}-${new Date().getFullYear()}
Date of Issue: ${issueDate}

This is to certify that ${studentName}, bearing Roll Number ${rollNumber}, was a bonafide student of this institution enrolled in the ${course} program. The student has completed/left the course as of ${issueDate}.

Details:
- Name: ${studentName}
- Roll Number: ${rollNumber}
- Course: ${course}
- Reason for Leaving: ${reason}

The student's conduct and character were satisfactory during their tenure at ${collegeName}.

Principal
${collegeName}
[Contact: principal@${collegeName.toLowerCase().replace(/\s/g, '')}.edu]
            `.trim();

            const resultDiv = document.getElementById('result');
            const tcOutput = document.getElementById('tcOutput');
            const message = document.getElementById('message');

            tcOutput.textContent = tcText;
            resultDiv.classList.remove('hidden');
            message.textContent = 'TC generated successfully!';
            message.style.color = '#28a745';

            resultDiv.scrollIntoView({ behavior: 'smooth' });
        });

        document.getElementById('downloadBtn').addEventListener('click', function() {
            const tcText = document.getElementById('tcOutput').textContent;
            const blob = new Blob([tcText], { type: 'text/plain' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `TC_${document.getElementById('rollNumber').value}.txt`;
            link.click();
        });

        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('tcForm').reset();
            document.getElementById('result').classList.add('hidden');
            document.getElementById('message').textContent = '';
        });
    </script>
</body>
</html>