/**
 * Created by brunolarosa on 27/12/13.
 */

$( document ).ready(
    function ()
    {
        $.get("./jenkins_jsonrpc.php?call=update", function(json) {
           updateJobs(json.result.jobs);
        }, "json");
    }
);


function updateJobs(jobs)
{

    for(key in jobs)
    {
        var job = jobs[key];

        var buildElement = $('#'+job.name);
        if(buildElement.length > 0)
        {
            alert("tot");
        }

    }
}

