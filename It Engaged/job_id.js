function showJobDetails(jobId) {
    fetch(`job-id.php?id=${jobId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('job-details').innerHTML = `
                <h3>${data.company_name}</h3>
                <p>Location: ${data.location}</p>
                <p>Job Type: ${data.job_type}</p>
                <p>Work Type: ${data.work_type}</p>
                <button onclick="showApplicationForm(${data.id})">Apply</button>
                <button>Save</button>
            `;
        });
}

   
function showJobDetails(jobId) {
    console.log('Fetching job details for ID:', jobId); // This will log the job ID
    fetch(`job-id.php?job_id=${jobId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('job-details').innerHTML = `<p>${data.error}</p>`;
            } else {
                document.getElementById('job-details').innerHTML = `
                    <h3>${data.company_name}</h3>
                    <p>Location: ${data.location}</p>
                    <p>Job Type: ${data.job_type}</p>
                    <p>Work Type: ${data.work_type}</p>
                    <button onclick="showApplicationForm(${data.id})">Apply</button>
                    <button>Save</button>
                `;
            }
        })
        .catch(error => console.error('Error fetching job details:', error));
}
