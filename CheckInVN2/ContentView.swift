//
//  ContentView.swift
//  CheckInVN2
//
//  Created by PPPP on 14/01/2023.
//

import SwiftUI

struct ContentView: View {
    @StateObject var userModel = UserViewModel()
    
    var body: some View {
        NavigationView {
            List {
                ForEach(userModel.users, id:\.userID)
                {
                    user in
                    HStack {
                        Text(user.userName)
                    }
                }
            }
            .navigationTitle("User")
            .onAppear{
                userModel.fetch()
            }
        }
    }
}
struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
