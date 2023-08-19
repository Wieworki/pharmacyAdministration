import { Component, OnInit } from '@angular/core';
import { AuthService } from './auth.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.less']
})
export class AppComponent implements OnInit{
  title = 'farmacia-frontend';
  usuarios = [];
  constructor(private authService: AuthService) {

  }

  ngOnInit(): void {
    this.authService.getUser().subscribe( 
      {
        next: (data: any) => {
          this.usuarios = data;
        }
      }
    );
  }
}
