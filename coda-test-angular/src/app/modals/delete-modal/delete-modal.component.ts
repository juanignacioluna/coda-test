import { Component, OnInit, Inject } from '@angular/core';
import {MAT_DIALOG_DATA, MatDialog, MatDialogRef} from '@angular/material/dialog';
import { ClientService } from 'src/app/services/client.service';

@Component({
  selector: 'app-delete-modal',
  templateUrl: './delete-modal.component.html',
  styleUrls: ['./delete-modal.component.scss']
})
export class DeleteModalComponent implements OnInit {

  constructor(
    @Inject(MAT_DIALOG_DATA) public data: any,
    private clientService: ClientService,
    private dialogRef: MatDialogRef<DeleteModalComponent>) { }

  ngOnInit(): void {
  }

  delete(){
    this.clientService.remove(this.data.item.id)
    .then(result => {
      this.dialogRef.close()
    })
  }

}
