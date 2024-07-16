<div class="modal" id="imageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="image_modal" class="row g-3" enctype="multipart/form-data">
                    <input type="hidden" class="receiver_id" name="receiver_id">
                    <div class="col-md-6">
                        <label for="images" class="form-label">Image:</label>
                        <input type="file" class="form-control images" id="images" name="images">
                    </div>
                    <input type="submit" value="Upload" class="btn btn-success upload" data-bs-dismiss="modal" />
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>