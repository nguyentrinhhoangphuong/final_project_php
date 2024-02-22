<?php
$xhtml .= "<div class='container p-5'>";
$xhtml .= "<h3 class='text-center'>Câu hỏi thường gặp</h3>";
$i = 1;
foreach ($this->faqs as $item) {
    $accordionId = 'accordionExample' . $i;
    $headingId = 'heading' . $i;
    $collapseId = 'collapse' . $i;
    $xhtml .= "
    <div class='accordion' id='$accordionId'>
        <div class='accordion-item'>
            <h2 class='accordion-header' id='$headingId' style=>
                <button class='accordion-button' style='font-weight: bold;' type='button' data-bs-toggle='collapse' data-bs-target='#$collapseId' aria-expanded='true' aria-controls='$collapseId'>" . $item['question'] . "</button>
            </h2>
            <div class='accordion-collapse collapse show' id='$collapseId' aria-labelledby='$headingId' data-bs-parent='#$accordionId'>
                <div class='accordion-body'>" . $item['answer'] . "</div>
            </div>
        </div>
    </div>";
    $i++;
}
$xhtml .= "</div>";
echo $xhtml;
